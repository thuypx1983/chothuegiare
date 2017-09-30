<?php

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();

$contentTypes=array('du-an-cho-thue','du-an','goi-dich-vu');
include 'lib.php';
$csv = new parseCSV();
$csv->auto('F:\Downloads\data.csv');
foreach($csv->data as $row){
    if(!in_array($row['hangsanxuat'],$contentTypes)){
        $node = new stdClass();
        $node->title = $row['ten'];
        $node->type = "product";
        node_object_prepare($node); // Sets some defaults. Invokes hook_prepare() and hook_node_prepare().
        $node->language = LANGUAGE_NONE; // Or e.g. 'en' if locale is enabled
        $node->uid = $user->uid;
        $node->status = 1; //(1 or 0): published or not
        $node->promote = 0; //(1 or 0): promoted to front page
        $node->comment = 0; // 0 = comments disabled, 1 = read only, 2 = read/write


#image
        $existing_filepath = 'F:\websites\chothuegiare.com\data_store\anhdaidien'.DIRECTORY_SEPARATOR.$row['hinhanh'];
        file_exists($existing_filepath);
        $new_filepath = "public://{$row['hinhanh']}";
        $drupal_file = file_save_data(file_get_contents($existing_filepath), $new_filepath);
        $drupal_file->alt = $node->title;
        $drupal_file->title = $node->title;
// Assign the file object to the node, as an array
        $node->field_image[$node->language][0] = get_object_vars($drupal_file);

// body
        $node->body[$node->language][0]['format']  = 'full_html';
        $node->body[$node->language][0]['value']  = $row['chitiet'];

//summary
        $node->field_summary[$node->language][0]['format']  = 'full_html';
        $node->field_summary[$node->language][0]['value']  = $row['mota'];

//taxonomy
        $terms_exsit=taxonomy_get_term_by_name($row['hangsanxuat']);
        if(count($terms_exsit)>0){
            $term=array_shift($terms_exsit);
        }else{
            $vocab = taxonomy_vocabulary_machine_name_load('product_category');
            $term = new stdClass();
            $term->name = $row['hangsanxuat'];
            $term->vid = $vocab->vid;
            taxonomy_term_save($term);
        }
        $node->	field_product_category[LANGUAGE_NONE][0]['tid']=$term->tid;

        $node->metatags[LANGUAGE_NONE]['title']['value'] = $row['title'];
        $node->metatags[LANGUAGE_NONE]['description']['value'] = $row['meta'];
        $node->metatags[LANGUAGE_NONE]['keywords']['value'] = $row['keyword'];

        $node = node_submit($node); // Prepare node for saving


        node_save($node);

/*
#meta_tag
// The type of entity being edited.
        $entity_type = 'node';
// The ID of the entity being changed.
        $entity_id = $node->nid;
// The revision ID for this entity, leave as NULL to ignore revisioning.
        $revision_id = NULL;
// Load the existing values, will return an empty array if anything found.
        $metatags = metatag_metatags_load($entity_type, $entity_id, $revision_id);
// Set the new meta tags. Most meta tags have a 'value' attribute.
        $metatags[LANGUAGE_NONE]['title']['value'] = $row['title'];
        $metatags[LANGUAGE_NONE]['description']['value'] = $row['meta'];
        $metatags[LANGUAGE_NONE]['keywords']['value'] = $row['keyword'];
// Update the meta tags. This also clears the entity's cache.
        metatag_metatags_save($entity_type, $entity_id, $revision_id, $metatags);*/
    }

}
fclose($csvFile);
