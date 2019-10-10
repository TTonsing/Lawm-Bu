<?php
/*
* Lawm Bu v.1.0.1 
* Revision updated on 20191009
* Author: TTonsing @Mungboi Media
* Pakage: Lawm Bu
* File Location: %WordpressRoot%/wp-content/plugins/lawm-bu/
* Description: This page display your contact list.
* Licence: GPL v2.0 or Later
*/
function lawm_vual() {
    ?>
    <style>
        table {
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid blue;
            padding: 5px;
            text-align: left;
        }
		table th {
			background: pink;
		}
    </style>
	<div class="wrap">
	<h3><span class="dashicons dashicons-groups"></span> Lawm Bu <span class="dashicons dashicons-book-alt"></span></h3>
	
        <table class="table-bordered table-striped">
            <thead>
                <tr>
                    <th>No <span class="dashicons dashicons-sticky"></span></th>
                    <th>Name <span class="dashicons dashicons-groups"></span></th>
                    <th>Address <span class="dashicons dashicons-location"></span></th>
                    <th>Contact <span class="dashicons dashicons-phone"></span></th>
					<th>Edit Record<span class="dashicons dashicons-edit"></span></th>
                </tr>
            </thead>
    <tbody>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'lawm_vual';
                $employees = $wpdb->get_results("SELECT id,name,contact,address from $table_name");
                foreach ($employees as $employee) {
                    ?>
                    <tr>
                        <td><?= $employee->id; ?></td>
                        <td><?= $employee->name; ?></td>
                        <td><?= $employee->address; ?></td>
                        <td><?= $employee->contact; ?></td>
						<td>
            <a href="<?php echo admin_url('admin.php?page=lawm_vual_update&id='.$employee->id); ?>" onclick="return confirm('You can Edit in the opening Window!\nProceed to Edit ?')"><b>Edit <span class="dashicons dashicons-edit"></span></b></a> |
            <a href="<?php echo admin_url('admin.php?page=lawm_vual_update&delete&id='.$employee->id); ?>"
               onclick="return confirm('Confirm Delete?\nYou can Delete in the opening Window!')"><b><span class="dashicons dashicons-dismiss"></span>Delete</b></a>
          </td>
                    </tr>
                <?php } ?>

            </tbody>
			</table>
			<a href="<?php echo admin_url('admin.php?page=lawm_vual_gelhlut'); ?>">Add Records</a>
    </div>
    <?php

}
add_shortcode('lawm_vual', 'lawm_vual');
?>
 
