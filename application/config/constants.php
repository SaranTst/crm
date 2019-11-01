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
define('DOCUMENT_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/crm/');
define('ARR_ROLE', array(1=>'Admin',2=>'Sale'));

// define Data CRM
define('ARR_RATING', array(
	1 => '&#xf005;&#xf006;&#xf006;&#xf006;&#xf006;',
	2 => '&#xf005;&#xf005;&#xf006;&#xf006;&#xf006;',
	3 => '&#xf005;&#xf005;&#xf005;&#xf006;&#xf006;',
	4 => '&#xf005;&#xf005;&#xf005;&#xf005;&#xf006;',
	5 => '&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;',
));

define('ARR_RELATIONSHIP', array(
	1,
	2,
	3,
	4,
	5
));

define('ARR_STATUS_TH', array(
	1 => 'นำเสนอลูกค้า',
	2 => 'สาธิตสินค้า',
	3 => 'ต่อรองราคา',
	4 => 'ประมูลราคา',
	5 => 'ชนะประมูล',
	6 => 'ทำสัญญาแล้ว',
	7 => 'ออกบิลแล้ว',
	8 => 'ส่งของแล้วตรวจรับ',
	9 => 'แพ้ประมูล',
	10 => 'เกินกำหนดการส่งสินค้า'
));

define('ARR_STATUS_ENG', array(
	1 => 'Status Propose',
	2 => 'Demo',
	3 => 'Negotiation',
	4 => 'Bidding',
	5 => 'Win',
	6 => 'Contract',
	7 => 'Billing',
	8 => 'Delivery',
	9 => 'Lose',
	10 => 'Overdue'
));

define('ARR_CONFIDENT', array(
	0 => 'ไม่ได้แน่นอน',
	25 => 'นำเสนอแล้ว แต่ยังมีแนวโน้มตัดสินใจเลือกคู่แข่ง',
	50 => 'นำเสนอแล้ว แต่มีแนวโน้มเลือกทั้งเราและคู่แข่งเท่าๆกัน',
	75 => 'ลูกค้าตัดใจเลือกเราแล้ว แต่ยังไม่ส่ง PO และทำสัญญา',
	100 => 'ลูกค้าส่ง PO หรือทำสัญญาเรียบร้อยแล้ว'
));

define('ARR_DEPARTMENT_TH', array(
	1 => 'แพทย์',
	2 => 'ทันตแพทย์',
	3 => 'พยาบาล',
	4 => 'เภสัชกร',
	5 => 'นักกายภาพบำบัด',
	6 => 'นักเทคนิคการแพทย์',
	7 => 'อื่นๆ'
));

define('ARR_DEPARTMENT_ENG', array(
	1 => 'Medical Doctor',
	2 => 'Dentist',
	3 => 'Nurse',
	4 => 'Pharmacist',
	5 => 'Physiotherapist',
	6 => 'Medical technologist',
	7 => 'Others'
));

define('ARR_ZONE', array(
	1 => 'ภาคเหนือ',
	2 => 'ภาคเหนือ-บน',
	3 => 'ภาคเหนือ-ล่าง',
	4 => 'ภาคกลาง',
	5 => 'ภาคอีสาน',
	6 => 'ภาคตะวันตก',
	7 => 'ภาคตะวันออก',
	8 => 'ภาคใต้-บน',
	9 => 'ภาคใต้-ล่าง'
));

define('ARR_PREFIX_TH', array(
	1 => 'นาย',
	2 => 'นาง',
	3 => 'นางสาว',
	4 => 'นพ.',
	5 => 'พญ.',
	6 => 'ทพ.',
	7 => 'ทพ.ญ.',
	8 => 'พว.',
	9 => 'ภก.',
	10 => 'ภญ.',
	11 => 'กภ.'
));

define('ARR_PREFIX_ENG', array(
	1 => 'Mr.',
	2 => 'Ms.',
	3 => 'Miss.',
	4 => 'Dr.',
	5 => 'Ass.Prof.Dr',
	6 => 'Prof.',
	7 => 'Prof.Dr.',
	8 => '',
	9 => '',
	10 => '',
	11 => ''
));

define('ARR_GENDER_TH', array(
	1 => 'ชาย',
	2 => 'หญิง'
));

define('ARR_GENDER_ENG', array(
	1 => 'Male',
	2 => 'Female'
));

define('ARR_CONTACT_CHANNAL', array(
	1 => 'Direct Sales',
	2 => 'Event & Activities'
));

define('ARR_EXPERTISE', array(
	1 => 'LABORATORY',
	2 => 'REHABILITATION',
	3 => 'CARDIOLOGY',
	4 => 'RADIOLOGY',
	5 => 'ORTHOPEDIC',
	6 => 'EDUCATIONAL MED',
	7 => 'DENTAL',
	8 => 'CSSD',
	9 => 'VET',
	10 => 'TELEMEDICINE',
	11 => 'EMERGENCY & TRAUMA/ICU',
	12 => 'HOSPITAL SUPPLY',
	13 => 'UROLOGY',
	14 => 'OPTHAMOLOGY',
	15 => 'GENERAL SURGERY',
	16 => 'NEUROLOGY/NEUROMED',
	17 => 'OB-GYNE'
));

define('ARR_POSITION_2', array(
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

define('ARR_POSITION', array(
	1 => 'Application Specialist Supervisor',
	2 => 'Application Specialist',
	3 => 'Assistant Product Manager',
	4 => 'Assistant R&D Manager',
	5 => 'Assistant Sales Manager',
	6 => 'Group Product Manager',
	7 => 'Product Manager',
	8 => 'Product Specialist',
	9 => 'Programmer',
	10 => 'Project Coordinator',
	11 => 'Research & Development Manager',
	12 => 'Sales Manager',
	13 => 'Sales Supervisor',
	14 => 'Senior Application Specialist',
	15 => 'Senior Laboratory Solution Manager',
	16 => 'Senior Product Specialist',
	17 => 'Senior Project Coordinator',
	18 => 'Senior Sales Manager',
	19 => 'Senior Technical Sales Representative',
	20 => 'Senior Business Development Manager',
	21 => 'Senior Product Specialist',
	22 => 'Senior Programmer',
	23 => 'Senior Project Coordinator',
	24 => 'Technical Sales Representative',
	25 => "Admin Officer",
	26 => "Assistant Service Engineer",
	27 => "Assistant Service Manager",
	28 => "Senior Service Engineer",
	29 => "Service Department Manager",
	30 => "Service Engineer",
	31 => "Service Int'l Support",
	32 => "Service Manager",
	33 => "Service Supervisor",
	34 => "Service Support",
	35 => "Service Support Engineer",
	36 => "Service Support Officer",
	37 => "Senior IT Specialist",
	38 => "Senior Sales Engineer",
	39 => "Senior Service Engineer",
	40 => "Senior Service Support Officer",
	41 => "Senior System Engineer",
	42 => "Senior Service Department Manager",
	43 => "Senior Service Engineer",
	44 => "System Engineer",
	45 => "System Engineer Supervisor",
	46 => 'Graphic Designer',
	47 => 'Marketing Executive',
	48 => 'Marketing Officer',
	49 => 'Marketing Supervisor',
	50 => 'Senior Marketing Executive',
	51 => 'Senior Marketing Manager'
));

define('ARR_POSITION_OPTGROUP', array(
	'1' => 'SALE',
	'25' => 'SERVICE',
	'46' => 'MARKETING'
));

