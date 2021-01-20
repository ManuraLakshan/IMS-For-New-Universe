<?php


class ajax_testControl extends CI_Controller
{
	function fetchdata()
	{
		if (isset($_POST["view"])) {

			if ($_POST["view"] != '') {

				$this->db->set('status', 0);
				$this->db->where('status', 1);
				$this->db->update('user_requests');

			}
			$query = $this->db->query("SELECT * FROM user_requests WHERE status = 1 ");
			$output = "";

			if (!empty($query)) {
				if ($query->num_rows() > 0) {
					$_SESSION["modele_notitfication"] = $query->result();
					$count = count($_SESSION["modele_notitfication"]);
					$i = 0;
					while ($count > $i) {
						$output .= "
							<div style='margin-top: -0px;'>
							<p class=\"red bg-light\">You have ". $_SESSION['noti_count']." Mails</p>
							
							<p class=\"dropdown-item media bg-white\" href=\"\" >
								
								
								<span class=\"message media-body\">
								
                                <span class=\"name float-left\" style='margin-top: 5px;'>Name :\t<strong>" . $_SESSION["modele_notitfication"][$i]->user_name . "</strong></span>
                                <span class=\"time float-right\" style='color: red;margin-top: -5px;'>Just now</span>
                                    <p>Position :\t" . $_SESSION["modele_notitfication"][$i]->role . "</p>
                                    <div>
                                    <a href=\"".base_url('index.php/Welcome/userRequestRespondSuccess/'.$userId= $_SESSION["modele_notitfication"][$i]->id)."\" style='border-radius: 20px;' class=\" btn btn-dark \">submit</a>
                                    <a href=\"".base_url('index.php/Welcome/userRequestRespondReject/'.$userId= $_SESSION["modele_notitfication"][$i]->id)."\" style='border-radius: 20px;'  class=\" btn btn-warning \">Reject</a>
                                    </div>
                            </span>
							</p>
							
							
							</div>
						";

						$i++;
					}
				}

			} else {
				$output .= "<li><a href='#' class='text-bold text-italic'>No Notification Found</a></li>";
			}

			$status_query = $this->db->query("SELECT * FROM user_requests WHERE status=1");
			if (!empty($status_query)) {
				if ($status_query->num_rows() > 0) {
					$_SESSION["count_notitfication"] = $query->result();
					$count = count($_SESSION["count_notitfication"]);
					$data = array(
						'notification' => $output,
						'unseen_notification' => $count
					);
					$_SESSION['noti_count'] = $count;
					echo json_encode($data);
				}
			}
		}
	}


}
