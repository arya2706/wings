 <!--   Core JS Files   -->
 <script src="{{asset('app-assets/js/core/popper.min.js')}}"></script>
 <script src="{{asset('app-assets/js/core/bootstrap.min.js')}}"></script>
 <script src="{{asset('app-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
 <script src="{{asset('app-assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
 <script src="{{asset('app-assets/js/plugins/chartjs.min.js')}}"></script>
 <!-- Github buttons -->
 <script async defer src="https://buttons.github.io/buttons.js"></script>
 <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
 <script src="{{asset('app-assets/js/soft-ui-dashboard.min.js?v=1.0.7')}}"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
   $(document).ready(function(){

   var current_fs, next_fs, previous_fs; //fieldsets
   var opacity;
   var current = 1;
   var steps = $("fieldset").length;

   setProgressBar(current);

   $(".next").click(function(){
       
       current_fs = $(this).parent();
       next_fs = $(this).parent().next();
       
       //Add Class Active
       $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
       
       //show the next fieldset
       next_fs.show(); 
       //hide the current fieldset with style
       current_fs.animate({opacity: 0}, {
           step: function(now) {
               // for making fielset appear animation
               opacity = 1 - now;

               current_fs.css({
                   'display': 'none',
                   'position': 'relative'
               });
               next_fs.css({'opacity': opacity});
           }, 
           duration: 500
       });
       setProgressBar(++current);
   });

   $(".previous").click(function(){
       
       current_fs = $(this).parent();
       previous_fs = $(this).parent().prev();
       
       //Remove class active
       $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
       
       //show the previous fieldset
       previous_fs.show();

       //hide the current fieldset with style
       current_fs.animate({opacity: 0}, {
           step: function(now) {
               // for making fielset appear animation
               opacity = 1 - now;

               current_fs.css({
                   'display': 'none',
                   'position': 'relative'
               });
               previous_fs.css({'opacity': opacity});
           }, 
           duration: 500
       });
       setProgressBar(--current);
   });

   function setProgressBar(curStep){
       var percent = parseFloat(100 / steps) * curStep;
       percent = percent.toFixed();
       $(".progress-bar")
       .css("width",percent+"%")   
   }

   $(".submit").click(function(){
       return false;
   })
       
   });
</script>