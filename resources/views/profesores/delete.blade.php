 {{--Inicio modal--}}
 <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title custom_align" id="heading-user-show">Material Delete</h4>
                           </div>
             {{--Inicio formualrio --}}

             <div class="modal-body">

                 <b>Are you sure you want to delete this material?</b>
             </div>
             <div class="modal-footer ">
                 <div class="ui buttons">
                     <button class="btn btn-info" id="btn-students-cancel"  data-dismiss="modal">No</button>
                     <a class="btn btn-success" data-title="delete">Yes</a>
                 </div>
             </div>

             {{--Final del formulario--}}
         </div>
     </div>
 </div> {{--Fin modal--}}