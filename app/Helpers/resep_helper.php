<?php

// app/Helpers/resep_helper.php
function format_bahan($bahanJson)
{
    $bahan = json_decode($bahanJson, true) ?? explode("\n", $bahanJson);
    return array_filter($bahan, fn($item) => !empty(trim($item)));
}

function format_langkah($langkahJson)
{
    $langkah = json_decode($langkahJson, true) ?? explode("\n", $langkahJson);
    return array_filter($langkah, fn($item) => !empty(trim($item)));
}
