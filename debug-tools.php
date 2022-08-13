<?php

// debug tools

function br()
{
    echo '<br><br>';
}

function qx()
{
    foreach (func_get_args() as $val) {
        if (is_object($val) && $val instanceof \yii\db\ActiveQuery) {
            $val = $val->createCommand()->rawSql;
        } elseif (is_object($val) && $val instanceof \yii\db\Command) {
            $val = $val->rawSql;
        }
        echo SqlFormatter::format($val);
    }
    exit;
}

function q()
{
    foreach (func_get_args() as $val) {
        if (is_object($val) && $val instanceof \yii\db\ActiveQuery) {
            $val = $val->createCommand()->rawSql;
        } elseif (is_object($val) && $val instanceof \yii\db\Command) {
            $val = $val->rawSql;
        }
        echo SqlFormatter::format($val);
    }
}

function d()
{
    echo '<pre>';
    foreach (func_get_args() as $val) {
        \yii\helpers\VarDumper::dump($val, 10);
    }

}

function dx()
{

    foreach (func_get_args() as $val) {
        d($val);
    }
    exit;
}

function ee($text)
{
    echo $text;
}
