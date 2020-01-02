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

define('ARR_STATUS_BTN', array(
	1 => 'btn crm-btn-light-purple',
	2 => 'btn crm-btn-purple',
	3 => 'btn crm-btn-dark-blue',
	4 => 'btn crm-btn-blue',
	5 => 'btn crm-btn-dark-green',
	6 => 'btn crm-btn-light-green',
	7 => 'btn crm-btn-yellow',
	8 => 'btn crm-btn-light-orange',
	9 => 'btn crm-btn-light-red',
	10 => 'btn crm-btn-pink'
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

define('ARR_DEPARTMENT_ADMIN_SALE', array(
	1 => 'MIT 1',
	2 => 'MIT 2',
	3 => 'MIT 3',
	4 => 'MIT 4',
	5 => 'SR 1',
	6 => 'SR2',
	7 => 'LCS 1',
	8 => 'LCS 2',
	9 => 'LCS 3',
	10 => 'Marketing',
	11 => 'BU',
	12 => 'President',
	13 => 'Medical Division'
));

define('ARR_DEPARTMENT_SERVICE', array(
	1 => 'Service 1',
	2 => 'Service 2',
	3 => 'Admin Service '
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
	9 => 'ภาคใต้-ล่าง',
	10 => 'None'
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

define('ARR_POSITION', array(
	1 => 'President of Healthcare and Technical Business',
	2 => 'Executive vice president',
	3 => 'Vice president',
	4 => 'Assistant Vice president',
	5 => 'Application Specialist Supervisor',
	6 => 'Application Specialist',
	7 => 'Assistant Product Manager',
	8 => 'Assistant R&D Manager',
	9 => 'Assistant Sales Manager',
	10 => 'Group Product Manager',
	11 => 'Product Manager',
	12 => 'Product Specialist',
	13 => 'Programmer',
	14 => 'Project Coordinator',
	15 => 'Research & Development Manager',
	16 => 'Sales Manager',
	17 => 'Sales Supervisor',
	18 => 'Senior Application Specialist',
	19 => 'Senior Laboratory Solution Manager',
	20 => 'Senior Product Specialist',
	21 => 'Senior Project Coordinator',
	22 => 'Senior Sales Manager',
	23 => 'Senior Technical Sales Representative',
	24 => 'Senior Business Development Manager',
	25 => 'Senior Product Specialist',
	26 => 'Senior Programmer',
	27 => 'Senior Project Coordinator',
	28 => 'Technical Sales Representative',
	29 => "Admin Officer",
	30 => "Assistant Service Engineer",
	31 => "Assistant Service Manager",
	32 => "Senior Service Engineer",
	33 => "Service Department Manager",
	34 => "Service Engineer",
	35 => "Service Int'l Support",
	36 => "Service Manager",
	37 => "Service Supervisor",
	38 => "Service Support",
	39 => "Service Support Engineer",
	40 => "Service Support Officer",
	41 => "Senior IT Specialist",
	42 => "Senior Sales Engineer",
	43 => "Senior Service Engineer",
	44 => "Senior Service Support Officer",
	45 => "Senior System Engineer",
	46 => "Senior Service Department Manager",
	47 => "Senior Service Engineer",
	48 => "System Engineer",
	49 => "System Engineer Supervisor",
	50 => 'Graphic Designer',
	51 => 'Marketing Executive',
	52 => 'Marketing Officer',
	53 => 'Marketing Supervisor',
	54 => 'Senior Marketing Executive',
	55 => 'Senior Marketing Manager'
));

define('ARR_POSITION_OPTGROUP', array(
	'1' => 'ADMINISTRATION',
	'5' => 'SALE',
	'29' => 'SERVICE',
	'50' => 'MARKETING'
));