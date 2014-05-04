<?php
$items = array();
/*foreach ($value as $key => $val ) {
    $items[$val[0]]=$val[$num];
	//$items[$val[0]]=$val;
	
}*/
foreach($value as  $val)
{
  /*foreach($num as $key=>$t)
  {
  $items[$t[0]]=$val[$key];
  }*/
    $cont++;
    $items[$cont][0]=  utf8_encode($val[0]);
      $items[$cont][1]=  utf8_encode($val[4]);
}

function array_to_json( $array ){

    if( !is_array( $array ) ){
        return false;

    }

    $associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));
    if( $associative ){

        $construct = array();
        foreach( $array as $key => $value ){

            // We first copy each key/value pair into a staging array,
            // formatting each key and value properly as we go.

            // Format the key:
            if( is_numeric($key) ){
                $key = "key_$key";
            }
            $key = "\"".addslashes($key)."\"";

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "\"".addslashes($value)."\"";
            }

            // Add to staging array:
            $construct[] = "$key: $value";
        }

        // Then we collapse the staging array into the JSON form:
        $result = "{ " . implode( ", ", $construct ) . " }";

    } else { // If the array is a vector (not associative):

        $construct = array();
        foreach( $array as $value ){

            // Format the value:
            if( is_array( $value )){
                $value = array_to_json( $value );
            } else if( !is_numeric( $value ) || is_string( $value ) ){
                $value = "'".addslashes($value)."'";
            }

            // Add to staging array:
            $construct[] = $value;
        }

        // Then we collapse the staging array into the JSON form:
        $result = "[ " . implode( ", ", $construct ) . " ]";
    }

    return $result;
}
$result = array();
$i=0;
foreach ($items as $k) {
    $i++;
      array_push($result, array("id"=>$k[0],"name"=>$k[1]));
      if ( $i > 7 ) {
          break;
      }
	  
}
echo array_to_json($result);

?>
