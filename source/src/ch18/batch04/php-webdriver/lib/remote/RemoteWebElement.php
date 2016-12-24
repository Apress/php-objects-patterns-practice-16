<?php
// Copyright 2004-present Facebook. All Rights Reserved.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//     http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.

/**
 * Represents an HTML element.
 */
class RemoteWebElement implements WebDriverElement, WebDriverLocatable {

  protected $executor;
  protected $id;

  public function __construct(WebDriverCommandExecutor $executor, $id) {
    $this->executor = $executor;
    $this->id = $id;
  }

  /**
   * If this element is a TEXTAREA or text INPUT element, this will clear the
   * value.
   *
   * @return WebDriverElement The current instance.
   */
  public function clear() {
    $this->executor->execute('clear', array(':id' => $this->id));
    return $this;
  }

  /**
   * Click this element.
   *
   * @return WebDriverElement The current instance.
   */
  public function click() {
    $this->executor->execute('clickElement', array(':id' => $this->id));
    return $this;
  }

  /**
   * Find the first WebDriverElement within this element using the given
   * mechanism.
   *
   * @param WebDriverBy $by
   * @return WebDriverElement NoSuchElementWebDriverError is thrown in
   *    WebDriverCommandExecutor if no element is found.
   * @see WebDriverBy
   */
  public function findElement(WebDriverBy $by) {
    $params = array(
      'using' => $by->getMechanism(),
      'value' => $by->getValue(),
      ':id'   => $this->id,
    );
    $raw_element = $this->executor->execute('elementFindElement', $params);

    return $this->newElement($raw_element['ELEMENT']);
  }

  /**
   * Find all WebDriverElements within this element using the given mechanism.
   *
   * @param WebDriverBy $by
   * @return array A list of all WebDriverElements, or an empty array if
   *    nothing matches
   * @see WebDriverBy
   */
  public function findElements(WebDriverBy $by) {
    $params = array(
      'using' => $by->getMechanism(),
      'value' => $by->getValue(),
      ':id'   => $this->id,
    );
    $raw_elements = $this->executor->execute('elementFindElements', $params);

    $elements = array();
    foreach ($raw_elements as $raw_element) {
      $elements[] = $this->newElement($raw_element['ELEMENT']);
    }
    return $elements;
  }

  /**
   * Get the value of a the given attribute of the element.
   *
   * @param string $attribute_name The name of the attribute.
   * @return string The value of the attribute.
   */
  public function getAttribute($attribute_name) {
    $params = array(
      ':name' => $attribute_name,
      ':id'   => $this->id,
    );
    return $this->executor->execute('getElementAttribute', $params);
  }

  /**
   * Get the value of a given CSS property.
   *
   * @param string $css_property_name The name of the CSS property.
   * @return string The value of the CSS property.
   */
  public function getCSSValue($css_property_name) {
    $params = array(
      ':propertyName' => $css_property_name,
      ':id'           => $this->id,
    );
    return $this->executor->execute('getElementCSSValue', $params);
  }

  /**
   * Get the location of element relative to the top-left corner of the page.
   *
   * @return WebDriverLocation The location of the element.
   */
  public function getLocation() {
    $location = $this->executor->execute(
      'getElementLocation',
      array(':id' => $this->id)
    );
    return new WebDriverPoint($location['x'], $location['y']);
  }

  /**
   * Try scrolling the element into the view port and return the location of
   * element relative to the top-left corner of the page afterwards.
   *
   * @return WebDriverLocation The location of the element.
   */
  public function getLocationOnScreenOnceScrolledIntoView() {
    $location = $this->executor->execute(
      'getElementLocationOnceScrolledIntoView',
      array(':id' => $this->id)
    );
    return new WebDriverPoint($location['x'], $location['y']);
  }

  /**
   * @return WebDriverCoordinates
   */
  public function getCoordinates() {
    $element = $this;

    $on_screen = null; // planned but not yet implemented
    $in_view_port = function () use ($element) {
      return $element->getLocationOnScreenOnceScrolledIntoView();
    };
    $on_page = function () use ($element) {
      return $element->getLocation();
    };
    $auxiliary = $this->getID();

    return new WebDriverCoordinates(
      $on_screen,
      $in_view_port,
      $on_page,
      $auxiliary
    );
  }

  /**
   * Get the size of element.
   *
   * @return WebDriverDimension The dimension of the element.
   */
  public function getSize() {
    $size = $this->executor->execute(
      'getElementSize',
      array(':id' => $this->id)
    );
    return new WebDriverDimension($size['width'], $size['height']);
  }

  /**
   * Get the tag name of this element.
   *
   * @return string The tag name.
   */
  public function getTagName() {
    return $this->executor->execute(
      'getElementTagName',
      array(':id' => $this->id)
    );
  }

  /**
   * Get the visible (i.e. not hidden by CSS) innerText of this element,
   * including sub-elements, without any leading or trailing whitespace.
   *
   * @return string The visible innerText of this element.
   */
  public function getText() {
    return $this->executor->execute(
      'getElementText',
      array(':id' => $this->id)
    );
  }

  /**
   * Is this element displayed or not? This method avoids the problem of having
   * to parse an element's "style" attribute.
   *
   * @return bool
   */
  public function isDisplayed() {
    return $this->executor->execute(
      'isElementDisplayed',
      array(':id' => $this->id)
    );
  }

  /**
   * Is the element currently enabled or not? This will generally return true
   * for everything but disabled input elements.
   *
   * @return bool
   */
  public function isEnabled() {
    return $this->executor->execute(
      'isElementEnabled',
      array(':id' => $this->id)
    );
  }

  /**
   * Determine whether or not this element is selected or not.
   *
   * @return bool
   */
  public function isSelected() {
    return $this->executor->execute(
      'isElementSelected',
      array(':id' => $this->id)
    );
  }

  /**
   * Simulate typing into an element, which may set its value.
   *
   * @param mixed $value The data to be typed.
   * @return WebDriverElement The current instance.
   */
  public function sendKeys($value) {
    $params = array(
      'value' => array((string)$value),
      ':id'   => $this->id,
    );
    $this->executor->execute('sendKeysToElement', $params);
    return $this;
  }

  /**
   * If this current element is a form, or an element within a form, then this
   * will be submitted to the remote server.
   *
   * @return WebDriverElement The current instance.
   */
  public function submit() {
    $this->executor->execute('submitElement', array(':id' => $this->id));

    return $this;
  }

  /**
   * Get the opaque ID of the element.
   *
   * @return string The opaque ID.
   */
  public function getID() {
    return $this->id;
  }

  /**
   * Return the WebDriverElement with $id
   *
   * @return WebDriverElement
   */
  private function newElement($id) {
    return new RemoteWebElement($this->executor, $id);
  }
}
