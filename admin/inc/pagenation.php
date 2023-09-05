<?php
      /* 페이지네이션 */
      $statLimit = ($pageNumber-1)*$pageCount; // (1-1)*10 = 0, (2-1)*10 = 10
      $endLimit = $pageCount;
      $firstPageNumber = $_GET['firstPageNumber'] ?? 0 ;
      
      /* 페이지 내 검색 */

      $search = $_GET['search'] ?? '';
      $search_where = '';
      $search_keyword = $title.$content;

      if($search){
          $search_where .= " and ({$title} like '%{$search}%' or {$content} like '%{$search}%' )";
      }
      /* /페이지 내 검색 */
    
      //전체 게시물 수 구하기
      $pagesql = "SELECT COUNT(*) AS cnt FROM ".$table." WHERE 1=1".$search_where;
      
      $page_result = $mysqli->query($pagesql);
      $page_row = $page_result->fetch_object();
      $row_num = $page_row->cnt; //전체 게시물 수
    
      $block_ct = 5; // 1,2,3,4,5  / 5,6,7,8,9 
      $block_num = ceil($pageNumber/$block_ct);//pageNumber 1,  9/5 1.2 2
      $block_start = (($block_num -1)*$block_ct) + 1;//page6 start 6
      $block_end = $block_start + $block_ct -1; //start 1, end 5
    
      $total_page = ceil($row_num/$pageCount);
      if($block_end > $total_page) $block_end = $total_page;
      $total_block = ceil($total_page/$block_ct);//총32, 2
      /* /페이지네이션 */
    
      $sql = "SELECT * FROM ".$table." WHERE 1=1";
    
      $sql .= $search_where;
      $order = " order by regdate desc";
      $limit = " limit $statLimit, $endLimit";
    
      $query = $sql.$order.$limit;
      
      $result = $mysqli -> query($query); 
      
      while($rs = $result -> fetch_object()){
        $rsc[] = $rs;
      }
?>
