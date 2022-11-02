<script>


    const dates = document.querySelectorAll('#end_date');


    new Datepicker(document.querySelector('#end_date'), {
        language: "{{ session()->get('locale') }}",
        format: "dd.mm.yyyy",
        autohide: true
    });

    
    const elements = document.querySelectorAll('#date');

    for(let element in elements) {
        new Datepicker(elements[element], {
            language: "{{ session()->get('locale') }}",
            format: "dd.mm.yyyy",
            autohide: true
        });
    }




</script>

<script>



         setTimeout(()=>{

             (function(w,d,u){

                     var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);

                     var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);

             })(window,document,'//code.jivosite.com/widget/TDdhjmlOeW');



          }, 5000)



       </script>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- <script async src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

<!-- <script async src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script> -->

<!-- <script async src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script> -->

<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- <script async src="assets/bootstrap/bootstrap.min.js"></script> -->

<!-- <script async src="assets/js/jquery.mixitup.js"></script> -->

<!-- <script async src="assets/js/owl.carousel.min.js"></script> -->

<!-- <script async src="assets/js/jquery.fancybox.min.js"></script> -->

<!-- <script async src="assets/js/jquery.datetimepicker.full.min.js"></script> -->

<!-- <script async src="assets/js/custom.js"></script> -->



<script>



      function preloadScript(src) {

      return new Promise(function(resolve, reject) {

         const s = document.createElement('script');

         let r = false;

         s.type = 'text/javascript';

         s.src = src;

         s.async = true;

         s.onerror = function(err) {

            reject(err, s);

         };

         s.onload = s.onreadystatechange = function() {

            // console.log(this.readyState); // uncomment this line to see which ready states are called.

            if (!r && (!this.readyState || this.readyState == 'complete')) {

            r = true;

            resolve();

            }

         };

         const t = document.getElementsByTagName('script')[0];

         t.parentElement.insertBefore(s, t);

      });

      }


      let timoutFunctionCars = 0;
      function loadAll(){

         promiseArray = [];

         promiseArray.push(preloadScript("https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"))

         promiseArray.push(preloadScript("https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"))

         promiseArray.push(preloadScript("/assets/landing/bootstrap/bootstrap.min.js"))

         promiseArray.push(preloadScript("/assets/landing/js/jquery.mixitup.js"))

         promiseArray.push(preloadScript("/assets/landing/js/owl.carousel.min.js"))

         promiseArray.push(preloadScript("/assets/landing/js/jquery.fancybox.min.js"))

         promiseArray.push(preloadScript("/assets/landing/js/jquery.datetimepicker.full.min.js"))



         Promise.all(promiseArray).then(() => {

            preloadScript("/assets/landing/js/custom.js")

         })

      }

      setTimeout(function(){

         preloadScript("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");



         document.querySelector("script[src$='1.11.1/jquery.min.js']")

            .onload = event => {

               loadAll();

            }





 let timoutFunctionCars = 0;



}, "timoutFunctionCars");



       </script>



<script type="text/javascript">

/* <![CDATA[ */

var google_conversion_id = 925101331;

var google_custom_params = window.google_tag_params;

var google_remarketing_only = true;

/* ]]> */

</script>

<script async type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">

</script>

<noscript>

    <div style="display:inline;">

        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/925101331/?guid=ON&amp;script=0"/>

    </div>

</noscript>



<script>



  setTimeout(()=>{

      (function(w,d,u){

              var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);

              var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);

      })(window,document,'//code.jivosite.com/widget/TDdhjmlOeW');



   }, 5000)



</script>

<script>

   setTimeout(()=>{

      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-100058989-1', 'auto');

  ga('send', 'pageview');



   }, 5000)

</script>



<script type="text/javascript">

const emitClickEventToGA = () => {

 ga('send', {

   hitType: 'event',

   eventCategory: 'nomer',

   eventAction: 'button',

 });

}



document.addEventListener("DOMContentLoaded", function(event) {

 document.querySelectorAll('.phones > li > a').forEach((node, index) => {

  if (index === 2) return;

  node.addEventListener('click', emitClickEventToGA)

 });

});



 </script>



<script type="text/javascript">

(function(d, w, s) {

var widgetHash = 'ph0tvkbzk9cmn82ymfmk', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;

ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';

var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);

})(document, window, 'script');

</script>



<script type="text/javascript">



   window.addEventListener('resize', function(){

        if(window.innerWidth < 425){

            let main = document.getElementById("main");

            let navbar = document.querySelector(".navbar");

            main.style.paddingTop = navbar.offsetHeight + "px";

         }

         else{

            let main = document.getElementById("main");

            main.style.paddingTop = 0

        }

      });

      document.addEventListener("DOMContentLoaded",function(){

         if(window.innerWidth < 425){

            let main = document.getElementById("main");

            let navbar = document.querySelector(".navbar");

            main.style.paddingTop = navbar.offsetHeight + "px";

         }

         else{

            let main = document.getElementById("main");

            main.style.paddingTop = 0

        }

		});





</script>



<script src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>

<script async>

   lazyload();

</script>

