<?php

class VAYU_BLOCKS_OPTION_PANEL {

    public function default_option(){

        return array(
            'global' => array(
                'containerWidth' => 1250,
                'containerGap' => 18,
                'containerPadding' => 20,
            ),
            'container' => array( 'isActive' => true,'type'=>'free'),
            'button' =>  array( 'isActive' => true,'type'=>'free'),
            'heading' =>  array( 'isActive' => true,'type'=>'free'),
            'spacer' =>  array( 'isActive' => true,'type'=>'free'),
            'product' =>  array( 'isActive' => true,'type'=>'free'),
            'postgrid' =>  array( 'isActive' => true,'type'=>'free'),
            'flipBox' =>  array( 'isActive' => true,'type'=>'free'),
            'image' =>  array( 'isActive' => true,'type'=>'free'),
            'video' =>  array( 'isActive' => true,'type'=>'free'),
            'icon' =>  array( 'isActive' => true,'type'=>'free'),
            'advanceSlider' =>  array( 'isActive' => true,'type'=>'free'),
            'advanceQueryLoop' =>  array( 'isActive' => true,'type'=>'free'),
            'imageHotspot' =>  array( 'isActive' => true,'type'=>'free'),
            'advanceTimeline' =>  array( 'isActive' => true,'type'=>'free'),
            'blurb' =>  array( 'isActive' => true,'type'=>'free'),
            'unfold' =>  array( 'isActive' => true,'type'=>'free'),
            'postPagination' =>  array( 'isActive' => true,'type'=>'free'),
        );

        }


    public function key_diff_update($getOption,$default){
        $keyDiff = array_diff_key($getOption, $default);
        if(!empty($keyDiff)){
            foreach($keyDiff as $key=>$valueq){
                unset($getOption[$key]);
            }
            update_option('vayu_blocks_options', $getOption);
        }
        return $getOption;
    }

    public function get_option($key='',$value=''){

    $vbo = get_option('vayu_blocks_options');

    if ($vbo ) {
        $new_vbo = $this->key_diff_update($vbo,$this->default_option());
       return array_merge($this->default_option(),$new_vbo);
    }else{

        return $this->default_option();
    }

    }
    public function update_option($data){

            $key    = isset($data['key'])?$data['key']:'';
            $value  =  isset($data['value'])?$data['value']:'';
            $type   = isset($data['type'])?$data['type']:'';
  // Check if the user is logged in
//   if (!is_user_logged_in()) {
//     wp_die('You must be logged in to perform this action.');
// }
        $vbo = get_option('vayu_blocks_options');
        if ($vbo) {
            $options = ($vbo);
        }else{
            $options = $this->default_option();
        }

        if($type ==='global'){
            $options[$key] = $value;
        }else{
            $options[$key]['isActive'] = $value;
        }

        update_option('vayu_blocks_options', $options);

    }

    public function delete_option(){


    }

}
