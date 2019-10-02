var processor_arr = new Array("Intel","AMD");

var p_a = new Array();
p_a[0]="";
p_a[1]=" Dual-Core | Core-2-Duo | i3 Dual-Core | i3 Quad-Core | i5 Dual-Core | i5 Quad-Core | i5 Octa-Core | i7 Dual-Core | i7 Quad-Core | i7 Octa-Core ";
p_a[2]=" Pinnacle Ridge Ryzen 2000 | Colfax Ryzen Threadripper 2000 series ";

function print_processor(processors_id){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var option_str = document.getElementById(processors_id);
	option_str.length=0;
	option_str.options[0] = new Option('---Select---','');
	option_str.selectedIndex = 0;
	for (var i=0; i<processor_arr.length; i++) {
		option_str.options[option_str.length] = new Option(processor_arr[i],processor_arr[i]);
	}
}

function print_processor_type(processors_Type, processor_index){
	var option_str = document.getElementById(processors_Type);
	option_str.length=0;	// Fixed by Julian Woods
	option_str.options[0] = new Option('---Select---','');
	option_str.selectedIndex = 0;
	var processor_type_arr = p_a[processor_index].split("|");
	for (var i=0; i<processor_type_arr.length; i++) {
		option_str.options[option_str.length] = new Option(processor_type_arr[i],processor_type_arr[i]);
	}
}
