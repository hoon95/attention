# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

**코드래빗(Code Rabbit)** — PHP 기반 코딩 교육 LMS(학습 관리 시스템).  
관리자 포털(`/admin`)과 사용자 포털(`/user`) 두 개의 독립된 애플리케이션으로 구성된다.

- 배포 환경: Apache 2.4, PHP 7.4, MySQL 8.0 (MariaDB)
- 로컬 베이스 경로: `/attention/` (모든 절대 경로가 이 prefix를 사용)

## 로컬 개발 실행

빌드 시스템이나 패키지 매니저 없음. Apache + PHP 환경에서 직접 실행한다.

```bash
# DB 초기화 (최초 1회)
mysql -u coderabbit -p coderabbit < coderabbit.sql

# Apache document root에서 접근
http://localhost/attention/user/index.php      # 사용자 포털
http://localhost/attention/admin/login.php     # 관리자 포털
```

## 코드 구조 및 아키텍처

### 공통 패턴

각 페이지는 상단에 `inc/header.php`를 include하고, 하단에 `inc/footer.php`를 include하는 구조다.  
`header.php`에서 `session_start()`와 DB 연결(`dbcon.php`) 이 함께 처리된다.

```php
<?php
$title = "페이지 제목";
include "../inc/header.php";  // session_start() + DB 연결 포함
// ... 페이지 콘텐츠
include "../inc/footer.php";
?>
```

### 인증 구조

| Guard | Session 키 | Check 파일 | 리다이렉트 |
|-------|-----------|-----------|-----------|
| 관리자 | `$_SESSION['AUID']` | `admin/inc/admin_check.php` | `/attention/admin/login.php` |
| 사용자 | `$_SESSION['UID']` | `user/inc/user_check.php` | `/attention/user/login.php` |

인증이 필요한 페이지는 `header.php` include 직후 해당 check 파일을 include한다.

### DB 연결

`admin/inc/dbcon.php`와 `user/inc/dbcon.php`가 동일한 내용으로 중복 존재.  
`$mysqli` 변수로 MySQLi 객체를 생성하며, 모든 쿼리는 이 변수를 직접 사용한다.

### 파일 업로드 경로

업로드 파일은 `/pdata/` 하위에 저장된다:
- `/pdata/class/` — 강의 썸네일, 프로모션 이미지
- `/pdata/coupon/` — 쿠폰 이미지
- `/pdata/notice/` — 공지 첨부파일

### 주요 DB 테이블

| 테이블 | 설명 | 핵심 컬럼 |
|--------|------|-----------|
| `class` | 강의 | `pid`, `cate/cate1/cate2/cate3`, `price_val`, `status` |
| `members` | 사용자 | `userid`, `userpw`(SHA-512), `status` |
| `admins` | 관리자 | `userid`, `passwd`(SHA-512), `level` |
| `category` | 3단계 계층 카테고리 | `code`, `pcode`, `step` |
| `coupons` | 쿠폰 | `coupon_price`, `status`, `due` |
| `user_coupons` | 사용자별 쿠폰 보유 현황 | `userid`, `cid` |
| `cart` | 장바구니 | `pid`, `userid` |
| `sales` | 수강 내역 | `pid`, `userid`, `price` |

### 알려진 보안 취약점 (수정 필요)

1. **SQL Injection**: 모든 쿼리가 문자열 직접 삽입 방식 — Prepared Statement로 전환 필요
2. **관리자 인증 버그**: `admin_check.php`의 `if(!$_SESSION['AUID'] == 'admin')` — 연산자 우선순위 오류
3. **비밀번호**: SHA-512 사용 중 — `password_hash()` / `password_verify()` 전환 필요
4. **파일 업로드**: 확장자/MIME 검증 없음

## Laravel 이전 진행 중

현재 이 프로젝트를 Laravel로 이전하는 작업이 계획되어 있다.  
이전 전략: `feat/laravel-migration` 브랜치에서 작업 예정.
- Eloquent ORM 사용 시 SQL Injection 자동 해결
- 관리자/사용자 Guard 분리: `config/auth.php`에 `admin` guard 추가
- `class` 테이블은 PHP 예약어 충돌로 인해 Model명 `Course`로 변경
