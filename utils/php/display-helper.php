<?php
function leftPicture($fileArray, $file, $contributors, $picture, $ref) {
  if($contributors !== null && is_array($contributors)) {
    $contributors = implode(", ", $contributors);
  }
  if(!file_exists($picture)) {
    //$picture = '../images/project_placeholder.png';
    $picture = "http://www.impactmania.com/im/wp-content/uploads/2018/10/Impact-Mania_logo-2.png";
  }
  if($ref === "project") {
    $ref = 'href="../data/' . $ref . '/web/' . basename($file, ".json") . '"';
  }

  // left side picture
  echo '<tr>
    <td class="table-studentname table-left table-element">
      <a class="inner-studentname">' . $contributors . '</a>
    </td>
    <td colspan="2" class="table-projectname table-right table-element">
      <a class="inner-projectname" href="../data/web/' . $source . '/' . basename($file, ".json") . '">' . $fileArray[0] . '</a>
    </td>
  </tr>
  <tr>
    <td class="table-studentpicture table-left table-element">
      <img class="inner-studentpicture" src="' . $picture . '">
    </td>
    <td colspan="2" class="table-projectbrief table-right table-element">
      <span class="inner-projectbrief">' . $fileArray[1] . '</span>
    </td>
  </tr>';
}

function rightPicture($fileArray, $file, $contributors, $picture, $ref) {
  if($contributors !== null && is_array($contributors)) {
    $contributors = implode(", ", $contributors);
  }
  if(!file_exists($picture)) {
    //$picture = '../images/project_placeholder.png';
    $picture = "http://www.impactmania.com/im/wp-content/uploads/2018/10/Impact-Mania_logo-2.png";
  }
  if($ref === "project") {
    $ref = 'href="../data/' . $ref . '/web/' . basename($file, ".json") . '"';
  }

  // right side picture
  echo '<tr>
    <td colspan="2" class="table-projectname table-left table-element">
      <a class="inner-projectname"' . $ref . '>' . $fileArray[0] . '</a>
    </td>
    <td class="table-studentname table-right table-element">
      <a class="inner-studentname">' . $contributors . '</a>
    </td>
  </tr>
  <tr>
    <td colspan="2" class="table-projectbrief table-left table-element">
      <span class="inner-projectbrief">' . $fileArray[1] . '</span>
    </td>
    <td class="table-studentpicture table-right table-element">
      <img class="inner-studentpicture" src="' . $picture . '">
    </td>
  </tr>';
}
?>
