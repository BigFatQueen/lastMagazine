<x-backend>
  <div class="row ">

   <div class="card col-md-12">
      <div class="mt-3 p-2">
         <button class="btn btn-info mb-2 btn-add float-right" type="button">+ADD</button>
         <h2 class="medium text-primary">Creating Academic Year</h2>
         <form id="form-list">
             <div class="table-responsive">
                <table class="table table-hover dataTable no-footer" id="facultyTable" >
                     <thead>
                       <tr role="row">
                         <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100;">No</th>
                           <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100;">Year</th>
                           <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100;">Created Date</th>
                           <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100;">Updated Date</th>
                           <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 100;">Action</th>
                         </tr>
                     </thead>
                   <tbody id="tbody">
                   
                   </tbody>
                 </table>
             </div>
         </form>
         <div id="btn-group">
            <button class="btn btn-success btn-store" type="button">Store</button>
            <button class="btn btn-primary btn-cancel" type="button">Cancel</button>
         </div>    
      </div>
   </div>
   
  </div>



           
<x-slot name="script">
  <script>
   $(document).ready(() => {
      
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      ajaxAcademicList();
      var table_num = 1;
      $("#btn-group").hide();

      //Add New Row To Table
      $(".btn-add").on("click", () => {
         var tr = `
            <tr role="row" class="tr add-row">
               <td>${table_num}</td>
               <td><input type="text" name="year[]" class="form-control year">
               <span class="eyear text-danger"></span></td>
                     
               <td></td>
               <td></td>
               <td colspan="2">
                  <button type="button" class="btn btn-danger btn-delete">Delete</button>
               </td>
            </tr>
         `;
         table_num++;
         disableButton();
         $("#tbody").append(tr);
         $("#btn-group").show();  
      });

      //Edit Table Data
      $(document).on("click",".btn-edit", (e) => {
         $(e.target).parents("tr").children("td:nth-child(2)").children("input").prop("disabled", false);
         $(e.target).parents("tr").children("td").last().children(".store-mode").show();
         $(e.target).parents("tr").children("td").last().children(".edit-mode").hide();
      });

      //Cancel From Adding New Data
      $(document).on("click",".btn-cancel", () => {
         $("#btn-group").hide();
         table_num = table_num - ($(".add-row").length)
         $(".add-row").remove();
      });

      //Cancel Mode For Edit Row
      $(document).on("click", ".cancel-mode", (e) => {
         $(e.target).parents("tr").children("td").first().children("input").prop("disabled", true);
         $(e.target).parents("tr").children("td").last().children(".store-mode").hide();
         $(e.target).parents("tr").children("td").last().children(".edit-mode").show();
         ajaxAcademicList();
         table_num = 1;
      })

      //Add New Data
      $(".btn-store").on("click", () => {
         var bool = CheckValue();
         if(bool) {
            var form_data = $("#form-list").serializeArray();
            $.ajax({
               type:'GET',
               url:'/academicStore/',
               data:form_data,
               success:function(data){
                  console.log(data)
                  if(data.status == 200) {
                     table_num = 1;
                     $("#btn-group").hide();
                     ajaxAcademicList();
                     // alert(data.message);
                  }
               },
               error:function(data){
                  let error=data.responseJSON.errors;

                  $.each(error,function(i,v){
                     console.log(v);
                     $(`.e${i}`).html(v);
                  })
               }
            });
         }else{
            alert("Please Check Input Field");
         }
      });

      //Edit Row Data
      $(document).on("click", ".store-edit", (e) => {
         let id = $(e.target).data("id");
         let html = $(e.target).parents(".tr").children("td:nth-child(2)");

         let name = html.children(".year").val();
         if(name != "") {
            $.ajax({
               type:'GET',
               url:'/academicEdit/'+id,
               data:{'name': name},
               success:function(data){
                  if(data.status == 200) {
                     table_num = 1;
                     ajaxAcademicList();
                     // alert(data.message);
                  }
               }
            });
         }else{
            html.children(".year").addClass("red");
            alert("Input Field Required");

         }
      })

      //Delete Table Row or Data
      $(document).on("click",".btn-delete", (e) => {
         let id = $(e.target).data('id');
         if(id) {
            if(confirm("Are You Sure You Want to Delete!!!")) {
               $.ajax({
                  type:'GET',
                  url:'/academicDelete/'+id,
                  success:function(data){
                     if(data.status == 200) {
                        table_num = 1;
                        ajaxAcademicList();
                        // alert(data.message);
                     }
                  }
               });
            }
         }else{
            $(e.target).parents("tr").remove();
            table_num--;
         }     
      });
      
      //Function Table with Ajax
      function ajaxAcademicList() {
         $.ajax({
            type:'GET',
            url:'/academicList',
            data:{'list':'list'},
            success:function(data){
               Table(data.data);
            }
         });
      }
      
      //Function Data input Talbe
      function Table(data) {
         let tbody = "";
         $.each(data, function(i, item) {
            let created_date = getDate(item.created_at);
            let updated_date = getDate(item.updated_at);
            tbody += `
               <tr role="row" class="tr">
                  <td>${table_num}</td>
                  <td><input type="text" name="year" class="form-control year" value="${item.name}" disabled></td>
                  <td>${created_date}</td>
                  <td>${updated_date}</td>
                  <td colspan="2">
                     <div class="edit-mode">
                        <button type="button" class="btn btn-secondary btn-edit">Edit</button>
                        <button type="button" class="btn btn-danger btn-delete" data-id="${item.id}">Delete</button>
                     </div>
                     <div class="store-mode" style="display:none">
                        <button type="button" class="btn btn-success store-edit" data-id="${item.id}">Store</button>
                        <button type="button" class="btn btn-warning cancel-mode">Cancel</button>
                     </div>
                  </td>
               </tr>`;
            table_num++;
         });
         $("#tbody").html(tbody)
      }

      //Function Date Format
      function getDate(date) {
         var d = new Date(date);
         var day = d.getDay();
         var month = d.getMonth();
         var year = d.getUTCFullYear();
         var min = d.getUTCMinutes();
         var hour = d.getUTCHours();

         return `${year}/${month}/${day} ${hour}:${min}`;
      }
      //Function Disabled input Fields
      function disableButton() {
         $("#tbody").children("tr").each( function() {
            if( !$(this).hasClass("add-row") ) {
               $(this).children("td").first().children("input").prop("disabled", true);
               $(this).children("td").last().children(".edit-mode").css("display", "block");
               $(this).children("td").last().children(".store-mode").css("display", "none");
            }
         });
      }

      function CheckValue() {
         var error = true;
         $(".add-row").each( function() {
            let value = $(this).children("td:nth-child(2)").children(".year").val();
            if(isNaN(value) || value == "") {
               $(this).children("td:nth-child(2)").children(".year").addClass("red");
               error = false;
            }else{
               $(this).children("td:nth-child(2)").children(".year").removeClass("red");
            }
         });
         return error;
      }
   });
  </script>
</x-slot>

</x-backend>