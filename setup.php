<?php
/**
 *                    Jojo CMS
 *                ================
 *
 * Copyright 2007 Harvey Kane <code@ragepank.com>
 * Copyright 2007 Michael Holt <code@gardyneholt.co.nz>
 * Copyright 2007 Melanie Schulz <mel@gardyneholt.co.nz>
 *
 * See the enclosed file license.txt for license information (LGPL). If you
 * did not receive this file, see http://www.fsf.org/copyleft/lgpl.html.
 *
 * @author  Harvey Kane <code@ragepank.com>
 * @author  Michael Cochrane <code@gardyneholt.co.nz>
 * @author  Melanie Schulz <mel@gardyneholt.co.nz>
 * @license http://www.fsf.org/copyleft/lgpl.html GNU Lesser General Public License
 * @link    http://www.jojocms.org JojoCMS
 */



//SMS
if (!Jojo::tableexists('smslog')) {
    echo "Table <b>smslog</b> Does not exist - creating empty table<br />";
    $query = "
        CREATE TABLE `smslog` (
        `smslogid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `sent` INT NOT NULL ,
        `from` VARCHAR( 30 ) NOT NULL ,
        `phone` VARCHAR( 30 ) NOT NULL ,
        `message` TEXT NOT NULL
        ) ENGINE = MYISAM ;
        ";
    Jojo::updateQuery($query);
}

Jojo::updateQuery("UPDATE {page} SET pg_link=? WHERE pg_link=?", array('JOJO_Plugin_Jojo_sms', 'jojo_sms.php'));

/* add page to menu - under admin section where it requires admin access */
$data = Jojo::selectQuery("SELECT * FROM page WHERE pg_link='JOJO_Plugin_Jojo_sms'");
if (count($data) == 0) {
    echo "Adding <b>SMS</b> Page to menu<br />";
    Jojo::insertQuery("INSERT INTO page SET pg_title='SMS', pg_link='JOJO_Plugin_Jojo_sms', pg_url='sms', pg_parent=?, pg_order=100", array($_ADMIN_ROOT_ID));
}