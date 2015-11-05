<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table hms_otp(otp_id int not null auto_increment, country_code int(3), cell_number int(10), otp_code int(6), created_time timestamp, updated_time timestamp, user_id varchar(100), primary key(otp_id));	
SQLTEXT;

$installer->run($sql);

$installer->endSetup();
	 