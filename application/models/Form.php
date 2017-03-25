<?php

defined('BASEPATH') or exit('No direct script access allowed');

/**
* 
*/
class Form extends CI_Model
{
    public function edit_text($table, $state, $data) {
    	echo '<br />';
    	if ($this->session->flashdata('done') != '') {
			echo '<div class="alert alert-danger alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $this->session->flashdata('done') . '</div>';
		}
    	echo '<form class="form-horizontal" id="form-' . $table . '" method="post">';
    	$tables = $this->CURL->cari($table, $state)->result_array();
    	$con = count($data);
    	for ($i=0; $i < 1 ; $i++) { 
    		echo '<div class="form-group">';
	    		echo '<label class="col-sm-2 control-label">' . ucwords($data[$i]) . '</label>';
	    			echo '<div class="col-sm-2">';
	      			echo '<input type="text" class="form-control" name="' . under($data[$i]) . '" id="' . under($data[$i]) . '" placeholder=" ' . $data[$i] . ' " value="' . $tables[0][under($data[$i])]. '" readonly>';
	    		echo '</div>';
	  		echo '</div>';
    	}
    	for ($i=1; $i < $con ; $i++) { 
    		echo '<div class="form-group">';
	    		echo '<label class="col-sm-2 control-label">' . ucwords($data[$i]) . '</label>';
	    			echo '<div class="col-sm-4">';
	      			echo '<input type="text" class="form-control" name="' . under($data[$i]) . '" placeholder="' . ucwords($data[$i]) . ' " value="' . $tables[0][under($data[$i])]. '">';
	    		echo '</div>';
	  		echo '</div>';
    	}
    	echo '<div class="form-group"><div class="col-sm-4 col-md-offset-2">';
    		echo '<a class="btn btn-primary" id="btn-e-' . $table . '"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</a> <a class="btn btn-default" id="btn-c-' . $table . '"><span class="glyphicon glyphicon-remove-circle"></span> Batal</a>';
    	echo '</div></div>';
    	echo '</form>';
    }

    public function tambah_text($table, $data) {
        echo '<br />';
        if ($this->session->flashdata('done') != '') {
            echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $this->session->flashdata('done') . '</div>';
        }
        echo '<form class="form-horizontal" id="form-' . $table . '" method="post">';
        $con = count($data);
        for ($i=0; $i < $con ; $i++) { 
            echo '<div class="form-group">';
                echo '<label class="col-sm-2 control-label">' . ucwords($data[$i]) . '</label>';
                    echo '<div class="col-sm-4">';
                    echo '<input type="text" class="form-control" name="' . under($data[$i]) . '" placeholder="' . ucwords($data[$i]) . '">';
                echo '</div>';
            echo '</div>';
        }
        echo '<div class="form-group"><div class="col-sm-4 col-md-offset-2">';
            echo '<a class="btn btn-primary" id="btn-t-' . $table . '"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</a> <a class="btn btn-default" id="btn-c-' . $table . '"><span class="glyphicon glyphicon-remove-circle"></span> Batal</a>';
        echo '</div></div>';
        echo '</form>';
    }
}
?>