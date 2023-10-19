-- 새로운 members 행 삽입
INSERT INTO `members` (`mid`, `username`, `userid`, `userpw`, `useremail`, `regdate`, `status`)
SELECT
    NULL,
    -- 미리 정의된 한글 이름 중 무작위로 선택
    (SELECT name FROM (SELECT '김철수' AS name UNION SELECT '이영희' UNION SELECT '박지영' UNION SELECT '최재훈' UNION SELECT '정민우' UNION SELECT '홍길동' UNION SELECT '서지원' UNION SELECT '윤수빈' UNION SELECT '임지현' UNION SELECT '한승우' UNION SELECT '송민준' UNION SELECT '조현우' UNION SELECT '이지훈' UNION SELECT '강지훈' UNION SELECT '신승민') AS names ORDER BY RAND() LIMIT 1) AS selected_name,
    SUBSTRING(MD5(RAND()) FROM 1 FOR RAND()*6 + 5) AS random_userid,
    SHA2(RAND(), 512) AS hashed_password,
    CONCAT(SUBSTRING(MD5(RAND()) FROM 1 FOR RAND()*6 + 5), '@example.com') AS random_email,
    DATE_FORMAT(NOW() - INTERVAL FLOOR(RAND() * 60) DAY, '%Y-%m-%d %H:%i:%s') AS random_regdate,
    CASE
        WHEN RAND() < 0.5 THEN '일반'
        ELSE '탈퇴'
    END AS random_status
FROM dual;