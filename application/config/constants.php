<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

define('KEY_PASSWORD', '_bjc_crm');
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/crm');
define('ARR_ROLE', array(1=>'Admin',2=>'Sale'));

// define Data CRM
define('ARR_RATING', array(
	5 => '&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;',
	4 => '&#xf005;&#xf005;&#xf005;&#xf005;&#xf006;',
	3 => '&#xf005;&#xf005;&#xf005;&#xf006;&#xf006;',
	2 => '&#xf005;&#xf005;&#xf006;&#xf006;&#xf006;',
	1 => '&#xf005;&#xf006;&#xf006;&#xf006;&#xf006;'
));

define('ARR_RELATIONSHIP', array(
	5,
	4,
	3,
	2,
	1
));

define('ARR_STATUS', array(
	'นำเสนอลูกค้า' => 'Status Propose',
	'สาธิตสินค้า' => 'Demo',
	'ต่อรองราคา' => 'Negotiation',
	'ประมูลราคา' => 'Bidding',
	'ชนะประมูล' => 'Win',
	'ทำสัญญาแล้ว' => 'Contract',
	'ออกบิลแล้ว' => 'Billing',
	'ส่งของแล้วตรวจรับ' => 'Delivery',
	'แพ้ประมูล' => 'Lose',
	'เกินกำหนดการส่งสินค้า' => 'Overdue'
));

define('ARR_CONFIDENT', array(
	0 => 'ไม่ได้แน่นอน',
	25 => 'นำเสนอแล้ว แต่ยังมีแนวโน้มตัดสินใจเลือกคู่แข่ง',
	50 => 'นำเสนอแล้ว แต่มีแนวโน้มเลือกทั้งเราและคู่แข่งเท่าๆกัน',
	75 => 'ลูกค้าตัดใจเลือกเราแล้ว แต่ยังไม่ส่ง PO และทำสัญญา',
	100 => 'ลูกค้าส่ง PO หรือทำสัญญาเรียบร้อยแล้ว'
));

define('ARR_DEPARTMENT', array(
	'แพทย์' => 'Medical Doctor',
	'ทันตแพทย์' => 'Dentist',
	'พยาบาล' => 'Nurse',
	'เภสัชกร' => 'Pharmacist',
	'นักกายภาพบำบัด' => 'Physiotherapist',
	'นักเทคนิคการแพทย์' => 'Medical technologist',
	'อื่นๆ' => 'Others'
));

define('ARR_ZONE', array(
	'ภาคเหนือ',
	'ภาคเหนือ-บน',
	'ภาคเหนือ-ล่าง',
	'ภาคกลาง',
	'ภาคอีสาน',
	'ภาคตะวันตก',
	'ภาคตะวันออก',
	'ภาคใต้-บน',
	'ภาคใต้-ล่าง'
));

define('ARR_PREFIX', array(
	'นาย' => 'Mr.',
	'นาง' => 'Ms.',
	'นางสาว' => 'Miss.',
	'นพ.' => 'Dr.',
	'พญ.' => 'Ass.Prof.Dr',
	'ทพ.' => 'Prof.',
	'ทพ.ญ.' => 'Prof.Dr.',
	'พว.' => '',
	'ภก.' => '',
	'ภญ.' => '',
	'กภ.' => ''
));

define('ARR_GENDER', array(
	'ชาย' => 'Male',
	'หญิง' => 'Female'
));

define('ARR_CONTACT_CHANNAL', array(
	'Direct Sales',
	'Event & Activities'
));

define('ARR_EXPERTISE', array(
	'LABORATORY',
	'REHABILITATION',
	'CARDIOLOGY',
	'RADIOLOGY',
	'ORTHOPEDIC',
	'EDUCATIONAL MED',
	'DENTAL',
	'CSSD',
	'VET',
	'TELEMEDICINE',
	'EMERGENCY & TRAUMA/ICU',
	'HOSPITAL SUPPLY',
	'UROLOGY',
	'OPTHAMOLOGY',
	'GENERAL SURGERY',
	'NEUROLOGY/NEUROMED',
	'OB-GYNE'
));

define('ARR_POSITION', array(
	'sale' => array(
		'Application Specialist Supervisor',
		'Application Specialist',
		'Assistant Product Manager',
		'Assistant R&D Manager',
		'Assistant Sales Manager',
		'Group Product Manager',
		'Product Manager',
		'Product Specialist',
		'Programmer',
		'Project Coordinator',
		'Research & Development Manager',
		'Sales Manager',
		'Sales Supervisor',
		'Senior Application Specialist',
		'Senior Laboratory Solution Manager',
		'Senior Product Specialist',
		'Senior Project Coordinator',
		'Senior Sales Manager',
		'Senior Technical Sales Representative',
		'Senior Business Development Manager',
		'Senior Product Specialist',
		'Senior Programmer',
		'Senior Project Coordinator',
		'Technical Sales Representative'
	),
	'service' => array(
		"Admin Officer",
		"Assistant Service Engineer",
		"Assistant Service Manager",
		"Senior Service Engineer",
		"Service Department Manager",
		"Service Engineer",
		"Service Int'l Support",
		"Service Manager",
		"Service Supervisor",
		"Service Support",
		"Service Support Engineer",
		"Service Support Officer",
		"Senior IT Specialist",
		"Senior Sales Engineer",
		"Senior Service Engineer",
		"Senior Service Support Officer",
		"Senior System Engineer",
		"Senior Service Department Manager",
		"Senior Service Engineer",
		"System Engineer",
		"System Engineer Supervisor"
	),
	'marketing' => array(
		'Graphic Designer',
		'Marketing Executive',
		'Marketing Officer',
		'Marketing Supervisor',
		'Senior Marketing Executive',
		'Senior Marketing Manager'
	)
));