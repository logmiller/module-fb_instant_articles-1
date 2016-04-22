<?php

/**
 * @file
 * Contains \Drupal\fb_instant_articles\InstantArticle
 */

namespace Drupal\fb_instant_articles;

class InstantArticle {
  /**
   * Decorated InstantArticle object.
   *
   * @var \Facebook\InstantArticles\Elements\InstantArticle
   */
  protected $instantArticle;

  /**
   * Node object for which we are building an InstantArticle object.
   *
   * @var \stdClass
   */
  protected $node;

  /**
   * InstantArticle constructor.
   * @param \Facebook\InstantArticles\Elements\InstantArticle $instantArticle
   */
  public function __construct($node, $instantArticle) {
    $this->node = $node;
    $this->instantArticle = $instantArticle;
  }

  /**
   * Gets the wrapped InstantArticle object.
   *
   * Also invokes a hook to allow other modules to alter the InstantArticle
   * object before render or any other operation.
   *
   * @see hook_fb_instant_articles_display_instant_article_alter()
   *
   * @return \Facebook\InstantArticles\Elements\InstantArticle
   */
  public function getArticle() {
    drupal_alter('fb_instant_articles_display_instant_article', $this->instantArticle, $this->node);
    return $this->instantArticle;
  }

  /**
   * @defgroup decorated Decorated methods
   * @{
   * Decorated methods of \Facebook\InstantArticles\Elements\InstantArticle.
   *
   * The \Drupal\fb_instant_articles\InstantArticle class decorates the Facebook
   * SDK Element class of the same name for the purpose of adding addtional
   * functionality, such as calling Drupal hooks.  Most methods are simply
   * delegated to the \Facebook\InstantArticles\Elements\InstantArticle object
   * instance.
   * @}
   */

  /**
   * {@inheritdoc}
   *
   * Adds Drupal hook to allow DOM element manipulation before rendering.
   *
   * @see \Facebook\InstantArticles\Elements\Element::render()
   * @see hook_fb_instant_articles_render_alter()
   */
  public function render($doctype = '<!doctype html>', $format = false) {
    return $this->getArticle()->render($doctype, $format);
  }

  /**
   * {@inheritdoc}
   */
  public function withCanonicalURL($url) {
    $this->instantArticle->withCanonicalURL($url);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function withCharset($charset) {
    $this->instantArticle->withCharset($charset);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function withStyle($style) {
    $this->instantArticle->withStyle($style);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function enableAutomaticAdPlacement() {
    $this->instantArticle->enableAutomaticAdPlacement();
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function disableAutomaticAdPlacement() {
    $this->instantArticle->disableAutomaticAdPlacement();
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function withHeader($header) {
    $this->instantArticle->withHeader($header);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function withFooter($footer) {
    $this->instantArticle->withFooter($footer);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function addChild($child) {
    $this->instantArticle->addChild($child);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getHeader() {
    return $this->instantArticle->getHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function getFooter() {
    return $this->instantArticle->getFooter();
  }

  /**
   * {@inheritdoc}
   */
  public function getChildren() {
    return $this->instantArticle->getChildren();
  }

  /**
   * {@inheritdoc}
   */
  public function addMetaProperty($property_name, $property_content) {
    $this->instantArticle->addMetaProperty($property_name, $property_content);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function toDOMElement($document = null) {
    return $this->instantArticle->toDOMElement($document);
  }

  /**
   * @} End of "defgroup decorator".
   */
}
