<?php

        $pagetwt ="https://twitter.com/EnVoitureSim0ne";

        function getCountTwitter($page)
        {// JE RECUPERE LE NOMBRE DE TWEETS
            $url = "http://urls.api.twitter.com/1/urls/count.json?url=".urlencode($page);
            $data = json_decode(file_get_contents($url));
         
            if(!isset($data->count)){ return 'erreur'; }
         
        return $data->count;
}


            $pagefb ="https://www.facebook.com/pages/En-Voiture-Simone/1488379481451366?sk=timeline";

            function getCountLikeFacebook($page)
        {// JE RECUPERER LE NOMBRE DE LIKES
            $url = "https://api.facebook.com/method/links.getStats?urls=".urlencode($page)."&format=json";
            $data = json_decode(file_get_contents($url));
         
            if(!isset($data[0]->like_count)){ return 'erreur'; }
         
            return $data[0]->like_count;

        }

       $resultfb = getCountLikeFacebook ($pagefb);
       $resulttwt = getCountTwitter($pagetwt);

       ///ADDITION

       $total = $resultfb + $resulttwt ;
       echo $total;
?>