<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function url_string($data)
{
    $tags_trimmed = str_replace(" ", "-", $data);
    return strtolower($tags_trimmed);
}

function btn_approve($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array('class' => "btn bg-olive btn-xs", 'title' => 'Approve', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to Approve this record ?');"));
}

function btn_deactive($uri)
{
    return anchor($uri, '<i class="fa fa-times"></i>', array('class' => "btn bg-danger btn-xs", 'title' => 'Deactive ', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to Deactive this record ?');"));
}

function btn_edit($uri)
{
    return anchor($uri, '<i class="glyphicon glyphicon-edit"></i>', array('class' => "btn bg-navy btn-xs", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}
function btn_edit_disable($uri)
{
    return anchor($uri, '<span class="glyphicon glyphicon-pencil"></span>', array('class' => "btn btn-primary btn-xs disabled", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_edit_modal($uri)
{
    return anchor($uri, '<span class="glyphicon glyphicon-pencil"></span>', array('class' => "btn btn-primary btn-xs", 'title' => 'Edit', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'data-toggle' => 'modal', 'data-target' => '#myModal'));
}

function btn_view_modal($uri)
{
    return anchor($uri, '<span class="glyphicon glyphicon-search"></span>', array('class' => "btn bg-olive btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'View', 'data-toggle' => 'modal', 'data-target' => '#myModal'));
}

function btn_delete($uri)
{
    return anchor($uri, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title' => 'Delete', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to delete this record ?');",
    ));
}

function btn_sorted($uri)
{
    return anchor($uri, '<i class="fa fa-check-circle-o"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'shortlist', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to sorted this record ?');",
    ));
}

function btn_interview($uri)
{
    return anchor($uri, '<i class="fa fa-check-circle-o"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Interview', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to interview this record ?');",
    ));
}

function btn_final($uri)
{
    return anchor($uri, '<i class="fa fa-check-circle-o"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Final', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('Are you sure want to final this record ?');",
    ));
}

function btn_delete_disable($uri)
{
    return anchor($uri, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs disabled", 'title' => 'Delete', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');",
    ));
}
function btn_active($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Active', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to active new sesion . This cannot be undone. Are you sure?');",
    ));
}

function btn_print()
{
    return anchor('', '<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-primary btn-xs", 'title' => 'Print', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => 'printDiv("printableArea")'));
}

function btn_atndc_print()
{
    return anchor('', '<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-customs btn-xs", 'title' => 'Print', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => 'printDiv("printableArea")'));
}

function btn_pdf($uri)
{
    return anchor($uri, '<span <i class="fa fa-file-pdf-o"></i></span>', array('class' => "btn btn-primary btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Pdf'));
}
function btn_excel($uri)
{
    return anchor($uri, '<span <i class="fa fa-file-excel-o"></i></span>', array('class' => "btn btn-primary btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Excel'));
}

function btn_view($uri)
{
    return anchor($uri, '<span class="glyphicon glyphicon-search"></span>', array('class' => "btn bg-olive btn-xs", 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'View'));
}

function btn_save($uri)
{
    return anchor($uri, '<span <i class="fa fa-plus-circle"></i></span>', array('class' => "btn btn-success btn-xs", 'title' => 'Save', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_add($uri)
{
    return anchor($uri, '<span <i class="fa fa-plus-square"></i></span>', array('class' => "btn btn-success btn-xs", 'title' => 'Add Routine', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_publish($uri)
{
    return anchor($uri, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title' => 'Click to Unpublish', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to unpublish an exam. Are you sure?');",
    ));
}

function btn_unpublish($uri)
{
    return anchor($uri, '<i class="fa fa-times"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title' => 'Click to PUblish', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'onclick' => "return confirm('You are about to publish an exam. Are you sure?');",
    ));
}

function btn_test_topic_add($uri)
{
    return anchor($uri, '<span <i class="fa fa-plus-square"></i></span>', array('class' => "btn btn-success btn-xs", 'title' => 'Add Topics For Test', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}

function btn_addbutton($uri)
{
    return anchor($uri, '<span <i class="fa fa-plus-square"></i></span>', array('class' => "btn btn-success btn-xs", 'title' => 'Add line item', 'data-toggle' => 'tooltip', 'data-placement' => 'top'));
}


function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, '-');

    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function date_calculate($date1, $date2)
{

    $datetime1 = new DateTime($date1);
    $datetime2 = new DateTime($date2);
    $interval  = $datetime1->diff($datetime2);
    $date=$interval->format('%y years %m months and %d days');
    return $date;
}

if (!function_exists('redirect_back')) {
    function redirect_back()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: http://' . $_SERVER['SERVER_NAME']);
        }
        exit;
    }

    function processtext($text,$nr=10) 
    { 
        $mytext=explode(" ",trim($text)); 
        $newtext=array(); 
        foreach($mytext as $k=>$txt) 
        { 
            if (strlen($txt)>$nr) 
            { 
                $txt=wordwrap($txt, $nr, "-", 1); 
            } 
            $newtext[]=$txt; 
        } 
        return implode(" ",$newtext); 
    } 
    /********* create unique slug  ***********/
    if ( ! function_exists('create_unique_slug')){
        function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL)
        {
            $t =& get_instance();
            $slug = url_title($string);
            $slug = strtolower($slug);
            $i = 0;
            $params = array ();
            $params[$field] = $slug;

            if($key)$params["$key !="] = $value;

            while ($t->db->where($params)->get($table)->num_rows())
            {  
                if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                    $slug .= '-' . ++$i;
                else
                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );

                $params[$field] = $slug;
            }  
            return $slug;  
        }
    }
    
    if (!function_exists('get_file_name')) {

        function get_file_name($file_name){

                $ext = pathinfo($file_name, PATHINFO_EXTENSION);

                $file_name=str_replace('.'.$ext,'',$file_name);

                return time().'_'.strtolower(preg_replace('~[^A-Za-z-0-9-]+~u', '',$file_name)).'.'.$ext;		

        }

        }
	
}
