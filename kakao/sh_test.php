<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<?php 

include_once('./setting.php');
$sql = "select url from news where script is null";
$result = mysqli_query($con, $sql);

foreach($result as $url){
    echo '<pre>'.$url['url'].'</pre>';
    $url = $url['url'];
    $urls = str_replace('amp;','',$url);
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, 'https://news.naver.com'.$urls); 
    // 헤더는 제외하고 content 만 받음
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    // 응답 값을 브라우저에 표시하지 말고 값을 리턴
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    // 브라우저처럼 보이기 위해 user agent 사용
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0'); 
    //크롤링해온 내용 content 변수에 저장
    $content = curl_exec($ch); 
    //인코딩이 utf-8이 아닌경우에만 사용
    $content = iconv('euc-kr','utf-8',$content);
    
    //explode로 필요한 부분만 잘라서 사용
    //explode('',$변수) -> ''을 기준으로 $변수 의 내용을 자르게 됨. ''기준으로 앞이 0번째 뒤가 1번째
    $text = explode('articleBodyContents', $content);
    $text = explode('</script>', $text[1]);
    if (strpos($test[1],"- Copyrights ⓒ 조선일보")){
        $text = explode('- Copyrights ⓒ 조선일보', $text[1]);
        $text = $text[0];
    }
    else if(strpos($test[1],"[국민일보 채널 구독하기]")){
        $text = explode('[국민일보 채널 구독하기]', $text[1]);
        $text = $text[0];
        echo "국민일보";
    }
    else{
        $text = explode('▶', $text[1]);
        $text = $text[0];
    }
   
    
    $script = preg_replace("(\<(/?[^\>]+)\>)", "", $text);
    $script = trim($script);
    $script = str_replace("'", '"', $script);

    echo $script;
    


    if ($script != ''){
        $sql = "update news set script='$script' where url='$url'";
        echo '<pre>'.$sql.'</pre>';

        if (mysqli_query($con, $sql)) {

            echo "레코드 수정 성공!";

        } else {

            echo "레코드 수정 실패! : ".mysqli_error($con);

        }
    }

    
   
    curl_close($ch);
   
}


mysql_close($con);




?>