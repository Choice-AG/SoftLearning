<?php

abstract class XmlSerializerBase{
  protected string $xmlHeader = '<?xml version="1.0" encoding="UTF-8"?>';

  //adptación recursiva
  protected function objectSerialize(stdClass $obj): string{
    $xml = "";
    foreach ($obj as $k => $v) {
      if (is_object($v)) {
        $xml .= '<' . $k . '>' . $this->objectSerialize($v) . '</' . $k . '>';
      } else {
        $xml .= '<' . $k . '>' . $v . '</' . $k . '>';
      }
    }
    return $xml;
  }
}