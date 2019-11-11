<?php
namespace Biboletin;

class HTMLElement
{
    private $tag;
    private $type;
    private $readOnly = false;
    private $selfClosing = false;
    private $classes;
    private $attributes = [];
    private $options = [];
    private $id;
    private $text = "";
    private $element;
    private $selfClosingTags = [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr',
    ];

    public function __construct($tag = null)
    {
        $this->tag = trim(strtolower($tag));
        if (($tag === null) || ($tag === "")) {
            $this->tag = "input";
        }
        if (in_array(strtolower($tag), $this->selfClosingTags)) {
            $this->selfClosing = true;
        }
    }

    public function type($type)
    {
        if ($this->tag !== "input") {
            die("Invalid " . $this->tag . " attribute: " . $type);
        }
        $this->type = $type;
        $elType = 'type="' . strtolower($type) . '" ';
        $this->attributes[] = $elType;
        return $this;
    }

    public function addClass($className = [])
    {
        $class = "";
        if (!empty($className)) {
            $class = 'class="' . implode(", ", $className) . '" ';
        }
        $this->attributes[] = $class;
        return $this;
    }

    public function id($idName = "")
    {
        $id = "";
        if (!empty($idName)) {
            $id = 'id="' . $idName . '" ';
        }
        $this->attributes[] = $id;
        return $this;
    }

    public function value($value = "")
    {
        if ($this->tag !== "input") {
            die("Invalid " . $this->tag . " attribute: value");
        }
        $this->attributes[] = 'value="' . trim($value) . '"';
        return $this;
    }

    public function readOnly($readOnly = null)
    {
        if ($readOnly) {
            $this->attributes[] = ' readonly';
        }
        return $this;
    }

    public function options($arr = [])
    {
        if ($this->tag !== "select") {
            die("Invalid " . $this->tag . " attribute: options");
        }
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                $this->options($value);
                continue;
            }
            $this->options[] = '<option value="' . trim($key) . '">' .
                trim($value) .
                '</option>';
        }
        return $this;
    }

    public function plainText($text)
    {
        $this->text .= $text;
        return $this;
    }

    private function build()
    {
        $element = "<";
        $element .= $this->tag . ' ';
        if (!empty($this->attributes)) {
            foreach ($this->attributes as $attributes) {
                $element .= $attributes;
            }
        }
        if ($this->selfClosing === true) {
            $element .= " />";
        }
        if (!$this->selfClosing) {
            $element .= ">";
            if (($this->tag === "select") && (!empty($this->options))) {
                foreach ($this->options as $options) {
                    $element .= $options;
                }
            }
            if (($this->tag !== "input") || ($this->tag !== "select")) {
                $element .= $this->text;
            }
            $element .= "</" . $this->tag . ">";
        }
        $this->element = $element;
    }
    
    public function getElement()
    {
        $this->build();
        return (string) $this->element;
    }

    public function __toString()
    {
        return (string) $this->element;
    }

    public function __destruct()
    {
        $this->tag = "";
        $this->type = "";
        $this->readOnly = false;
        $this->selfClosing = false;
        $this->selfClosingTags = null;
        $this->classes = null;
        $this->attributes = null;
        $this->options = null;
        $this->id = null;
        $this->text = "";
        $this->element = "";
    }
}
