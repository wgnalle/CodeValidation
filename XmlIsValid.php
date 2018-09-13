<?php
# XmlIsValid.php
# by William Nalle
# 2018-09-11
# Validates XML for basic formatting errors such as mismatched tags

function XmlIsValid($xml) {
        // Supress XML error display
        $extErrors = libxml_use_internal_errors(true);

        try {
                $doc = new DOMDocument('1.0', 'utf-8');
                $doc->loadXML($xml);

                $errors = libxml_get_errors();
                libxml_clear_errors();

        } catch (Exception $e) {
                $errors = array('error' => $e->GetMessage());
        }

        // Reset XML errors
        libxml_use_internal_errors($extErrors);
        return empty($errors);
}


?>
