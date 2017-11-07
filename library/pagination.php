<?php
/***********************************************
	     Paging Functions
************************************************/

function getPagingQuery($query, $itemPerPage = 10)
{
	if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}

	// start fetching from this row number
	$offset = ($page - 1) * $itemPerPage;

	return $query . " LIMIT $offset, $itemPerPage";
}


function getPagingLink($query, $itemPerPage = 10, $strGet = '')
{
	global $link;
	$result        = mysqli_query($link, $query);
	$pagingLink    = '';
	$totalResults  = mysqli_num_rows($result);
	$totalPages    = ceil($totalResults / $itemPerPage);

	// how many link pages to show
	$numLinks      = 10;


	// create the paging links only if we have more than one page of results
	if ($totalPages > 1) {

		$self = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] ;


		if (isset($_GET['page']) && (int)$_GET['page'] > 0) {
			$pageNumber = (int)$_GET['page'];
		} else {
			$pageNumber = 1;
		}

		// print 'previous' link only if we're not
		// on page one
		if ($pageNumber > 1) {
			$page = $pageNumber - 1;
			if ($page > 1) {
				$prev = " <a href=\"$self?page=$page&$strGet/\"><span class='fa fa-angle-left'></span></a> ";
			} else {
				$prev = " <a href=\"$self?$strGet\"><span class='fa fa-chevron-left'></span></a> ";
			}

			$first = " <a href=\"$self?$strGet\"><span class='fa fa-angle-double-left'></span></a> ";
		} else {
			$prev  = ''; // we're on page one, don't show 'previous' link
			$first = ''; // nor 'first page' link
		}

		// print 'next' link only if we're not
		// on the last page
		if ($pageNumber < $totalPages) {
			$page = $pageNumber + 1;
			$next = " <a href=\"$self?page=$page&$strGet\"><span class='fa fa-chevron-right'></span></a> ";
			$last = " <a href=\"$self?page=$totalPages&$strGet\"><span class='fa fa-angle-double-right'></span></a> ";
		} else {
			$next = ''; // we're on the last page, don't show 'next' link
			$last = ''; // nor 'last page' link
		}

		$start = $pageNumber - ($pageNumber % $numLinks) + 1;
		$end   = $start + $numLinks - 1;

		$end   = min($totalPages, $end);

		$pagingLink = array();
		for($page = $start; $page <= $end; $page++)	{
			if ($page == $pageNumber) {
				$pagingLink[] = " <span class='current'>$page</span> ";   // no need to create a link to current page
			} else {
				if ($page == 1) {
					$pagingLink[] = " <a href=\"$self?$strGet\">$page</a> ";
				} else {
					$pagingLink[] = " <a href=\"$self?page=$page&$strGet\">$page</a> ";
				}
			}

		}

		$pagingLink = implode(' ', $pagingLink);

		// return the page navigation link
		$pagingLink = $first . $prev . $pagingLink . $next . $last;
	}

	return $pagingLink;
}
?>