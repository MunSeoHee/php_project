<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $userkey = $data["user_key"];
    $content = $data["content"];

    $_POST["userkey"] = $userkey;
    include './grade_point_count.php';
    

    $con = mysqli_connect(
        '18.224.229.40',
        'admin',
        'admin',
        'db',
        '3306'
    );

    switch($content)
    {
        case "총 이수 학점":
            echo <<<EOD
            {
                "message":
                {
                    "text": "당신의 이수 학점은 $total_point 입니다."
                },
                "keyboard":
                {
                    "type": "buttons",
                    "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                }
            }
EOD;
            
            break;
        case "학점 계산":
            echo <<<EOD
            {
                "message":
                {
                    "text": "당신의 학점은 $score 입니다."
                },
                "keyboard":
                {
                    "type": "buttons",
                    "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                }
            }
EOD;
            
            break;
 
        case "학점 기록":
            echo <<<EOD
                {
                    "message":
                    {
                        "message_button": 
                        {
                            "label": "기록하러 가기",
                            "url": "http://ec2-18-224-229-40.us-east-2.compute.amazonaws.com/php_project/kakao/grade_form.php?user=$userkey"
                        }
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }
EOD;
            break;
 
        case "학점":
            echo '
                {
                    "message":
                    {
                        "text": "원하는 메뉴를 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점 기록", "학점 계산", "총 이수 학점"]
                    }
                }';
            break;

        case "공지":
            echo '
                {
                    "message":
                    {
                        "text": "원하는 메뉴를 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }';
            break;

        case "학사일정":
            echo '
                {
                    "message":
                    {
                        "text": "원하는 달을 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["11월", "12월", "1월", "2월"]
                    }
                }';
            break;

        case "11월":
            
            include './calander.php';
            echo <<<EOD
            {
                "message":
                {
                    "text": $calander
                },
                "keyboard":
                {
                    "type": "buttons",
                    "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                }
            }
EOD;
            break;
        case "12월":
            
            echo '
                {
                    "message":
                    {
                        "text": "원하는 달을 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }';
            break;
        case "1월":
            
            echo '
                {
                    "message":
                    {
                        "text": "원하는 달을 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }';
            break;
        case "2월":
            
            echo '
                {
                    "message":
                    {
                        "text": "원하는 달을 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }';
            break;

        case "교육과정":
            echo '
                {
                    "message":
                    {
                        "text": "원하는 달을 선택해주세요."
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["학점", "공지", "학사일정", "교육과정", "정보 등록"]
                    }
                }';
            break;

        case "학과등록":
            echo '
                {
                    "message":
                    {
                        "text": "단과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["경영대학", "사회과학대학","인문대학","법과대학","공과대학","바이오나노대학","IT융합대학", "한의과대학", "예술대학"]
                    }
                }';
            break;

        case "경영대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["경영학부(경영학)", "금융수학과"]
                    }
                }';
            break;
        case "사회과학대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["미디어커뮤니케이션학과", "관광경영학과", "글로벌경영학과", "의료경영학과", "응용통계학과", "사회복지학과", "유아교육학과"]
                    }
                }';
            break;
        case "인문대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["한국어문학과", "영미어문학과", "동양어문학과", "유럽어문학과"]
                    }
                }';
            break;
        case "법과대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["법학과", "경찰안보학과", "행정학과", "경찰학연계전공"]
                    }
                }';
            break;
        case "공과대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["도시계획학과", "조경학과", "실내건축학과", "건축학과", "건축공학과", "설비소방공학과", "화공생명공학과", "화공생명공학과(환경에너지공학과)", "기계공학과", "토목환경공학과", "산업경영공학과", "신소재공학과"]
                    }
                }';
            break;
        case "바이오나노대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["바이오나노학과", "나노화학과", "나노물리학과", "생명과학과", "식품생물공학과", "식품영양학과"]
                    }
                }';
            break;
        case "IT융합대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["컴퓨터공학과", "전자공학과", "전기공학과", "에너지IT학과"]
                    }
                }';
            break;
        case "예술대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["회화조소전공", "시각디자인전공", "산업디자인전공", "패션디자인전공", "성악전공", "기악전공", "작곡전공", "체육전공", "태권도전공", "예술연기학과"]
                    }
                }';
            break;
        case "한의과대학":
            echo '
                {
                    "message":
                    {
                        "text": "학과를 선택해주세요"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["한의학과"]
                    }
                }';
            break;
 
        default:
            echo '
                {
                    "message":
                    {
                        "text": "회원가입 완료"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["가입", "기록", "확인"]
                    }
                }';
            break;
    }

    
?>