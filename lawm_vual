<?php
/*
* Lawm Bu v.1.0.1 
* Revision updated on 20191009
* Author: TTonsing
* Pakage: Lawm Bu
* File Location: %WordpressRoot%/wp-content/plugins/lawm-bu/lawm_vual_gelhlut.php
* Description: This page is for adding new Lawm (friends) contact list.
* Licence: GPL v2.0 or Later
*/
function lawm_vual_gelhlut() {
    $id = $_POST["id"];
    $name = sanitize_text_field($_POST["name"]);
	$address = sanitize_text_field($_POST["address"]);
	$contact = sanitize_text_field($_POST["contact"]);
    //insert
    if (isset($_POST['insert']) && ($name !=NULL )|| ($address !=NULL) || ($contact != NULL)) {
        global $wpdb;
        $table_name = $wpdb->prefix . "lawm_vual";

        $wpdb->insert(
                $table_name, //table
                array( 'name' => $name, 'address' =>$address, 'contact'=>$contact), //data
                array('%s', '%s') //data format			
        );
        $message.="Min gelhlutta";
    }
	else { $message .="Please Fill all the Fields" ;
	}
    ?> 
    <div class="wrap">
        <h2>Add New Lawm Friends</h2>
		<a href="<?php echo admin_url('admin.php?page=lawm_vual'); ?>">&laquo; Go Back</a>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Add New Lawm Vual</p>
            <table class='wp-list-table widefat fixed'>
                <!--tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<//?php echo $id; ?>" class="ss-field-width" /></td>
                </tr-->
                <tr>
                    <th class="ss-th-width" width="20%">Name</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width" id="name" maxlength="30" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width" width="20%">Address</th>
                    <td><input type="text" name="address" value="<?php echo $address; ?>" class="ss-field-width" id="address" maxlength="100"/></td>
                </tr>
				<tr>
                    <th class="ss-th-width" width="20%">Contact</th>
                    <td><input type="text" name="contact" value="<?php echo $contact; ?>" class="ss-field-width" id="contact" maxlength="12"/></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button' onclick="return confirm('Confirm to Save?')" />  <input type='button' name="reset" value='Reset' class='button' onclick="click_reset()">
        </form>
    </div>
	<script type="text/javascript">
	var ids =['name','address','contact'];
function click_reset(){
	for (var i=0; i<ids.length; i++) {
	document.getElementById(ids[i]).value="";
	}
}
	
</script>
    <?php
}
?>
