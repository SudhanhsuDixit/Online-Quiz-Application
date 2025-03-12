public function allservice(){
    
    return view('adminbackend.service_page.service_index');
}
  public function ServiceEdit($id){

     
      return view('adminbackend.service_page.service_edit');

   } //

   public function ServiceUpdate(){

      $servicepage = HomeSlide::find(1);
     

   } //