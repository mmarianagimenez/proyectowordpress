function theChampHorizontalCounterOptionsToggle(e){if(jQuery(e).is(":checked")){jQuery("#the_champ_horizontal_counter_options").css("display","table-row-group")}else{jQuery("#the_champ_horizontal_counter_options").css("display","none")}}function theChampVerticalCounterOptionsToggle(e){if(jQuery(e).is(":checked")){jQuery("#the_champ_vertical_counter_options").css("display","table-row-group")}else{jQuery("#the_champ_vertical_counter_options").css("display","none")}}function theChampToggleOffset(e){var t=e=="left"?"right":"left";jQuery("#the_champ_sc_"+e+"_offset_rows").css("display","table-row-group");jQuery("#the_champ_sc_"+t+"_offset_rows").css("display","none")}if(typeof String.prototype.trim!=="function"){String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g,"")}}jQuery(document).ready(function(){jQuery("#the_champ_sc_rearrange, #the_champ_sc_vertical_rearrange").sortable()})