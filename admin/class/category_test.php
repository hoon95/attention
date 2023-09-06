        <tr class="white_back d-flex">
          <td class="class_list_img d-flex align-items-center class_list_item" data-pid="<?= $item->pid ?>">
            <img src="<?= $item->thumbnail ?>" alt="thumbnail image">
          </td>
          <td class="d-flex flex-column justify-content-between class_sm_mtb flex-grow-1 class_list_item" data-pid="<?= $item->pid ?>">
            <div class="class_ss_mb">
              <span class="text2"><?= $item->name ?></span><span class="class_level_tag orange"><?php if($item->level==1){echo "초급";} if($item->level==2){echo "중급";} if($item->level==3){echo "상급";} ?></span>
            </div>
            <div class="class_p_val "><?php if($item->price==1){echo "{$item->price_val}원";} ?><?php if($item->price==0){echo "무료";} ?></div>
            <div class="class_ss_mb">
              <span class="text4 fw-bold">수강기한</span><span class="class_date_tag orange"><?php if($item->sale_end_date==1){echo "{$item->sale_end_date}개월";} if($item->sale_end_date==0){echo "무제한";} ?></span>
            </div>
          </td>
          <td class="class_button">
            <div class="form-check form-switch d-flex justify-content-end">
              <input class="form-check-input status" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="<?= $item->status ?>"
              <?php if($item->status){ echo "checked"; } ?> name="status[<?php echo $item->pid ?>]" id="status[<?php echo $item->pid ?>]" data-pid="<?= $item->pid ?>">
            </div>
            <div>
              <a href="class_modify.php?pid=<?= $item->pid ?>"><i class="bi bi-pencil-square icon_mint"></i></a>
              <!-- <a href="class_delete.php?pid=<?= $item->pid ?>" class="class_delete"><i class="bi-trash-fill icon_red"></i></a> -->
              <form method="post" action="class_delete.php">
                <input type="hidden" name="pid" value="<?php echo $item -> pid; ?>">
                <button type="submit" name="confirm_delete" onclick="return confirm('정말 삭제하시겠습니까?')" class="class_delete"><i class="bi-trash-fill icon_red"></i></button>
              </form>
            </div>
          </td>
        </tr>