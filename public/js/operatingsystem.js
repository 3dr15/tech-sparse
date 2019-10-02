var os_arr = new Array("Microsoft Windows","Linux");

var s_a = new Array();
s_a[0]="";
s_a[1]=" Windows 7 | Windows 8 | Windows 8.1 | Windows 10 | Windows Server 2012 | Windows Server 2015 | Windows Server 2018 ";
s_a[2]=" Fedora | Linux Mint | Ubuntu | Kali Linux | Open Suze | Arch Linux";

function print_os(processors_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(processors_id);
	option_str.length=0;
	option_str.options[0] = new Option('---Select---','');
	option_str.selectedIndex = 0;
	for (var i=0; i<os_arr.length; i++) {
		option_str.options[option_str.length] = new Option(os_arr[i],os_arr[i]);
	}
}

function print_os_type(os_type, processor_index){
	var option_str = document.getElementById(os_type);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('---Select---','');
	option_str.selectedIndex = 0;
	var os_type_arr = s_a[processor_index].split("|");
	for (var i=0; i<os_type_arr.length; i++) {
		option_str.options[option_str.length] = new Option(os_type_arr[i],os_type_arr[i]);
	}
}
