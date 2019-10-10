<?php
/*
* Lawm Bu v.1.0.1 
* Revision updated on 20191009
* Author: TTonsing
* Pakage: Lawm Bu
* File Location: %WordpressRoot%/wp-content/plugins/lawm-bu/lawm_vual_update.php
* Description: This page updates any Lawm Bu records contact list.
* Licence: GPL v2.0 or Later
*/

function lawm_vual_update() {
    global $wpdb, $table_name;
    $table_name = $wpdb->prefix . "lawm_vual";
    $id = $_GET["id"];
    $name = stripslashes_deep($_POST["name"]);
	$address = stripslashes_deep($_POST["address"]);
	$contact = stripslashes_deep ($_POST["contact"]);
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				/*array('id'=>$id),
                array('name' => $name), //data
                array('address' => $address), //where
				array('contact' => $contact), //where
                array('%d','%s', '%s', '%s'), //data format
                array('%d','%s','%s', '%s') //where format */
				array('name' => $name, 'address' =>$address, 'contact'=>$contact), //data
				array('id'=>$id),    // index id is auto increment and cannot be overwritten/or updated
				array('%s','%s', '%s'), // we can update the the columns except the first col. 
                array('%d') //data format	
				
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id = %s", $id));
    } else {//selecting value to update	
        $schools = $wpdb->get_results($wpdb->prepare("SELECT name,address,contact from $table_name where id=%s", $id));
        foreach ($schools as $s) {
			//$id =$s->id;
            $name = $s->name;
			$address =$s->address;
			$contact =$s->contact;
			
        }
    }
    ?>
    
    <div class="wrap">
        <h2>Lawm Bu Update Friends Contact List</h2>
		<a href="<?php echo admin_url('admin.php?page=lawm_vual'); ?>">&laquo; Back</a>
        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Lawm deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=lawm_vual') ?>">&laquo; Back to Lawm Vual</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Lawm Bu updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=lawm_vual') ?>">&laquo; Back to Lawm Vual</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
					<tr width="20%" ><th width="5%">No </th><td width="20%"><input type="text" name="id" value="<?php echo $id.' *don\'t edit this*'; ?>"/></td></tr>
                    <tr width="20%" ><th width="5%">Name</th><td width="20%"><input type="text" name="name" value="<?php echo $name; ?>" maxlength="30"/></td></tr>
					<tr width="20%" ><th width="5%">Address</th><td width="20%"><input type="text" name="address" value="<?php echo $address; ?>"maxlength="100"/></td></tr>
					<tr width="20%"><th width="5%">Contact</th><td width="20%"><input type="text" name="contact" value="<?php echo $contact; ?>" maxlength="12"/></td></tr>
                </table>
                <input type='submit' name="update" value='Update' class='button' onclick="return confirm('Confirm Update?')" />&nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('Confirm to delete?')"/>
            </form>
        <?php } ?>

    </div>
    <?php
}
