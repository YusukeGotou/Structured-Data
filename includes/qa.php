<?php

function qa() {
   $ID = get_the_ID();
   if(strlen(get_post_meta($ID, 'q1', true)) > 0 ){
      $q1 = get_post_meta($ID, 'q1', true); 
      $a1 = get_post_meta($ID, 'a1', true); 
      $q2 = get_post_meta($ID, 'q2', true); 
      $a2 = get_post_meta($ID, 'a2', true); 
      $q3 = get_post_meta($ID, 'q3', true); 
      $a3 = get_post_meta($ID, 'a3', true); 
      $qa = <<<EOM
         <script type="application/ld+json">
         {
             "@context": "https://schema.org",
             "@type": "FAQPage",
             "mainEntity": [{
                 "@type": "Question",
                 "name": "{$q1}",
                 "acceptedAnswer": {
                     "@type": "Answer",
                     "text": "{$a1}"
                 }
             }, {
                 "@type": "Question",
                 "name": "{$q2}",
                 "acceptedAnswer": {
                     "@type": "Answer",
                     "text": "{$a2}"
                 }
             }, {
                 "@type": "Question",
                 "name": "{$q3}",
                 "acceptedAnswer": {
                     "@type": "Answer",
                     "text": "{$a3}"
                 }
             }]
         }
         </script>
         EOM;
         }
      echo $qa;

   }
add_action( 'wp_head', 'qa', 99);
