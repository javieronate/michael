<?php
/**
 * Created by PhpStorm.
 * User: jom
 * Date: 3/29/16
 * Time: 3:39 PM
 */
$db = new mysqli('localhost', 'jom','lehendakari', 'buenasPracticas');



for($x=1;$x<31;$x++){
	$y=$x;
	$sql="update bp_buenasPracticas set
	descripcion ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. Phasellus vitae dolor ut metus lobortis pharetra eget at leo. Mauris fringilla fermentum mauris, eu posuere nulla egestas et. Nullam accumsan elit ac arcu maximus, eget pretium nisi scelerisque. In a pharetra mauris. Ut nec volutpat diam. Nunc cursus velit nibh, sit amet tincidunt neque egestas id. Vivamus venenatis pulvinar urna, sed pellentesque felis imperdiet mollis. Nunc et ex imperdiet, ornare ligula ut, vulputate lacus. Proin nec leo vitae purus rhoncus ultricies non sit amet sem. Etiam pulvinar justo volutpat, tempor tellus eu, faucibus quam. Ut eu vehicula ipsum, non venenatis ante. Nullam fringilla erat at eros fringilla semper."."',
	experiencia ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. Phasellus vitae dolor ut metus lobortis pharetra eget at leo. Mauris fringilla fermentum mauris, eu posuere nulla egestas et. Nullam accumsan elit ac arcu maximus, eget pretium nisi scelerisque. In a pharetra mauris. Ut nec volutpat diam. Nunc cursus velit nibh, sit amet tincidunt neque egestas id. Vivamus venenatis pulvinar urna, sed pellentesque felis imperdiet mollis. Nunc et ex imperdiet, ornare ligula ut, vulputate lacus. Proin nec leo vitae purus rhoncus ultricies non sit amet sem. Etiam pulvinar justo volutpat, tempor tellus eu, faucibus quam. Ut eu vehicula ipsum, non venenatis ante. Nullam fringilla erat at eros fringilla semper."."',
	sustentabilidad ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. Phasellus vitae dolor ut metus lobortis pharetra eget at leo. Mauris fringilla fermentum mauris, eu posuere nulla egestas et. Nullam accumsan elit ac arcu maximus, eget pretium nisi scelerisque. In a pharetra mauris. Ut nec volutpat diam. Nunc cursus velit nibh, sit amet tincidunt neque egestas id. Vivamus venenatis pulvinar urna, sed pellentesque felis imperdiet mollis. Nunc et ex imperdiet, ornare ligula ut, vulputate lacus. Proin nec leo vitae purus rhoncus ultricies non sit amet sem. Etiam pulvinar justo volutpat, tempor tellus eu, faucibus quam. Ut eu vehicula ipsum, non venenatis ante. Nullam fringilla erat at eros fringilla semper."."',
	compatibilidad ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. Phasellus vitae dolor ut metus lobortis pharetra eget at leo. Mauris fringilla fermentum mauris, eu posuere nulla egestas et. Nullam accumsan elit ac arcu maximus, eget pretium nisi scelerisque. In a pharetra mauris. Ut nec volutpat diam. Nunc cursus velit nibh, sit amet tincidunt neque egestas id. Vivamus venenatis pulvinar urna, sed pellentesque felis imperdiet mollis. Nunc et ex imperdiet, ornare ligula ut, vulputate lacus. Proin nec leo vitae purus rhoncus ultricies non sit amet sem. Etiam pulvinar justo volutpat, tempor tellus eu, faucibus quam. Ut eu vehicula ipsum, non venenatis ante. Nullam fringilla erat at eros fringilla semper."."',
	variaciones ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. "."',
	recursos ='"."$y - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac hendrerit magna. Proin ut fringilla arcu. Pellentesque porttitor libero vel rutrum pretium. Curabitur nec fringilla lectus. "."',
	aprenderMas ='"."$y - Lorem ipsum dolor"."' where id=$y";
	$resultado = $db->query($sql);

}