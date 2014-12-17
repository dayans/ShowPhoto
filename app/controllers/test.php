<?php
class test extends BaseController {
    
    public function test()
    {
        $data = DB::table('photo')->orderby('id','desc')->get();
        foreach ($data as $item)
        {
            echo $item['id'];
        }
    }
}