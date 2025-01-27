<?php namespace PFBC\View;
class View_SideBySide extends FormView {
    protected $class = "form-horizontal";
    private $sharedCount = 0;

    public function renderElement ($element) {
        $colSize = 'col-xs-12 col-md-8';

        if ($element instanceof Element_Hidden || $element instanceof Element_HTML || $element instanceof Element_Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Element_Radio && !$element instanceof Element_Checkbox && !$element instanceof Element_File)
            $element->appendAttribute("class", "form-control");

        if ($this->noLabel) {
            $label = $element->getLabel();
            $element->setAttribute("placeholder", $label);
            $element->setLabel("");
        }

        if ($this->sharedCount == 0)
            echo '<div class="form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);

        if ($element->getShared ()) {
            $colSize = $element->getShared ();
            $this->sharedCount += $colSize[strlen ($colSize) - 1];
        }

        echo " <div class='$colSize'> ";
        echo $element->render(), $this->renderDescriptions($element);
        echo " </div> ";

        if ($this->sharedCount == 0 || $this->sharedCount == 8) {
            $this->sharedCount = 0;
            echo " </div> ";
        }
    }

    protected function renderLabel (Element $element) {
        $label = $element->getLabel();
        if(empty ($label))
            $label = '';
        echo ' <label class="text-left-xs col-xs-12 col-md-4 control-label" for="', $element->getAttribute("id"), '">';
        if (!$this->noLabel && $element->isRequired())
            echo '<span class="required">* </span>';
        echo $label, '</label> ';
    }

    public function renderCSS () {
        parent::renderCSS();
        echo '@media (max-width: 1000px) { .text-left-xs { text-align: left !important; }}';
    }
}
