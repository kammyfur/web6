<?php
$settings = [
	"banner" => "#3b3b3b",
	"name" => "Minteck Projects",
	"lang" => "en",
	"link" => "https://minteck-projects.alwaysdata.net",
]
?>
<!DOCTYPE html>
<?php
$data = json_decode(file_get_contents("./output.json"));
if (json_last_error() != JSON_ERROR_NONE) {
    die("<head><title>Internal Error</title></head><body><h1>Error</h1><p>We're sorry, but we couldn't get services status at this time, the services status server may be down or malfunctionning.</p><p>If the problem persists, we suggest you to contact Minteck Projects.</p><hr><p><i><center>powered by Auto-uptime</center></i></p></body></html>");
}
foreach ($data->sites as $element) {
    if (is_array($element->data)) {
		foreach ($element->data as $el) {
			if ($el->data->code == 1) {
				if (isset($glob)) {
					if ($glob <= 1) {
						$glob = 1;
					}
				} else {
					$glob = 1;
				}
			}
			if ($el->data->code == 2) {
				if (isset($glob)) {
					if ($glob <= 2) {
						$glob = 2;
					}
				} else {
					$glob = 2;
				}
			}
			if ($el->data->code == 3) {
				if (isset($glob)) {
					if ($glob <= 3) {
						$glob = 3;
					}
				} else {
					$glob = 3;
				}
			}
		}
	} else {
		if ($element->data->data->code == 1) {
			if (isset($glob)) {
				if ($glob <= 1) {
					$glob = 1;
				}
			} else {
				$glob = 1;
			}
		}
		if ($element->data->data->code == 2) {
			if (isset($glob)) {
				if ($glob <= 2) {
					$glob = 2;
				}
			} else {
				$glob = 2;
			}
		}
		if ($element->data->data->code == 3) {
			if (isset($glob)) {
				if ($glob <= 3) {
					$glob = 3;
				}
			} else {
				$glob = 3;
			}
		}
	}
}
if (!isset($glob)) {
	$glob = 0;
}
$lastBarPos = 0;
function svgBar(int $day, int $code) {
	global $lastBarPos;
	$bpOld = $lastBarPos;
	$lastBarPos = $lastBarPos + 27;
	if ($code == 0) {
		return '<rect class="uptime-day component-rhznvxg4v7yh day-' . $day . '" data-html="true" fill="#43b581" height="34" width="18" x="' . $bpOld . '" y="0"></rect>';
	} else if ($code == 1) {
		return '<rect class="uptime-day component-rhznvxg4v7yh day-' . $day . '" data-html="true" fill="#baab3e" height="34" width="18" x="' . $bpOld . '" y="0"></rect>';
	} else if ($code == 2) {
		return '<rect class="uptime-day component-rhznvxg4v7yh day-' . $day . '" data-html="true" fill="#d9a92d" height="34" width="18" x="' . $bpOld . '" y="0"></rect>';
	} else if ($code == 3) {
		return '<rect class="uptime-day component-rhznvxg4v7yh day-' . $day . '" data-html="true" fill="#f04747" height="34" width="18" x="' . $bpOld . '" y="0"></rect>';
	} else {
		return '<rect class="uptime-day component-rhznvxg4v7yh day-' . $day . '" data-html="true" fill="#4374b5" height="34" width="18" x="' . $bpOld . '" y="0"></rect>';
	}
}
$updated = "some time ago";
// Add this little piece of code to prevent crash on no more than 10 seconds
$tmp = explode(":", $data->date);
if((int)$tmp[2] < 10) {
    $tmp[2] = 0 . $tmp[2];
}
$cdate = implode(":", $tmp);
$now = new DateTime("now");
if (isset($_GET['debug'])) {
	var_dump($data->date);
	var_dump($cdate);
	var_dump($now);
	var_dump(DateTime::createFromFormat('j/n/Y G:i:s', $cdate));
	var_dump($_SERVER);
}
$update = DateTime::createFromFormat('j/n/Y G:i:s', $cdate);
$diff = $update->diff($now);
if ($diff->i > 0) {
    if ($diff->i > 1) {
        $updated = "" . $diff->i . " minutes ago";
    } else {
        $updated = "" . $diff->i . " minute ago";
    }
} else {
    $updated = "just now";
}
if ($diff->h > 0) {
    if ($diff->h > 1) {
        $updated = "" . $diff->h . " hours ago";
    } else {
        $updated = "" . $diff->h . " hour ago";
    }
}
if ($diff->d > 0) {
    if ($diff->d > 1) {
        $updated = "" . $diff->d . " days ago";
    } else {
        $updated = "" . $diff->d . " day ago";
    }
}
if ($diff->m > 0) {
    if ($diff->m > 1) {
        $updated = "" . $diff->m . " months ago";
    } else {
        $updated = "" . $diff->m . " month ago";
    }
}
if ($diff->y > 0) {
    if ($diff->y > 1) {
        $updated = "" . $diff->y . " year ago";
    } else {
        $updated = "" . $diff->y . " years ago";
    }
}
?>
<html lang="en">
    <head style="margin:0;">
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta charset="utf-8">
        <title><?= $settings["name"] ?> Status</title>
        <meta content="True" name="HandheldFriendly">
        <meta content="320" name="MobileOptimized">
        <meta name="description" content="Get latest info about Minteck Projects' system performance, uptime and availability.">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" name="viewport">
        <meta content="on" http-equiv="cleartype">
        <link href="/static/logos/main-full.png" rel="shortcut icon" type="image/png">
        <meta content="y_VzfckMy4iePo5oDJNivyYIjh8LffYa4jzUndm_bZ" name="_globalsign-domain-verification">
        <link href="rsc/0.css" media="screen" rel="stylesheet">
        <link href="rsc/status_manifest-623f5cf5ab25cbd8fcc079855c8f4a36d4e876dcbded.css" media="all" rel="stylesheet">
        <link href="rsc/unified/unified.css" rel="stylesheet">

        <!-- Polymer Website Styles -->
        <link rel="stylesheet" href="/static/css/fonts.css">
        <style>
            * {
                font-family: "Ubuntu", -apple-system, "Segoe UI", "Roboto", "Oxygen", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif !important;
                font-weight: 300;
            }
        </style>
        <script src="rsc/jquery.js"></script>
        <link href="rsc/external20150919-24148-18786ow.css" rel="stylesheet" type="text/css">
    </head>
    <body class="status index status-none" data-breakpoint-reached="false" style="margin:0;">
        <div class="layout-content status status-index starter">
            <div class="masthead-container basic" style="background-color:<?= $settings['banner'] ?>;height: 100%;">
                <div class="masthead has-logo">
                    <div class="logo-container" style="margin-top: 16px;">
                        <a href="<?= $settings["link"] ?>" target="_blank"><img height="128px" src="/static/logos/main-full.png" style=""></a>
                    </div>
                    <div class="updates-dropdown-container" data-js-hook="updates-dropdown-container" style="top: 31px;">
                        <a class="show-updates-dropdown" data-js-hook="show-updates-dropdown" href="#" id="show-updates-dropdown"></a>
                        <div class="updates-dropdown" data-js-hook="updates-dropdown" style="display:none">
                            <div class="updates-dropdown-nav nav-items-4">
                                <a class="active" href="#updates-dropdown-webhook" id="updates-dropdown-webhook-btn"><span class="icon-container webhook"></span></a> <a href="#updates-dropdown-support" id="updates-dropdown-support-btn"><span class="icon-container support"></span></a> <a href="#updates-dropdown-atom" id="updates-dropdown-atom-btn"><span class="icon-container rss"></span></a> <a data-js-hook="updates-dropdown-close" href="#" id="updates-dropdown-close-btn">x</a>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="page-status mprj-<?php
				if ($glob == 0) {
					echo("ok");
				} else if ($glob == 1) {
					echo("minor");
				} else if ($glob == 2) {
					echo("major");
				} else if ($glob == 3) {
					echo("critical");
				} else {
					echo("maintenance");
				}
				?>">
                    <span class="status font-large"><?php
				if ($glob == 0) {
					echo("All Systems Operational");
				} else if ($glob == 1) {
					echo("Minor Connection Problems");
				} else if ($glob == 2) {
					echo("Major Connection Problems");
				} else if ($glob == 3) {
					echo("Critical Connectivity Problems");
				} else {
					echo("Unknown Systems State");
				}
				?></span> <span class="last-updated-stamp font-small"></span>
                </div>
                <div class="components-section font-regular">
                    <i class="component-status hidden major_outage"></i>
                    <div class="components-uptime-link history-footer-link">
                        Uptime over the past 30 minutes.
                    </div>
                    <div class="components-container one-column">
                        <?php
					foreach ($data->sites as $site) {
						if (!$site->main) {
							if (count($site->data)) {
								echo('<div class="component-container border-color is-group"><div class="component-inner-container" data-js-hook="component-group-opener"><span class="name"><span class="fa group-parent-indicator color-secondary font-small fa-plus-square-o"></span> <span>' . $site->name . '</span></span>');
								$lglob = 0;
								foreach ($site->data as $el) {
									if ($el->data->code == 1) {
										if (isset($lglob)) {
											if ($lglob <= 1) {
												$lglob = 1;
											}
										} else {
											$lglob = 1;
										}
									}
									if ($el->data->code == 2) {
										if (isset($lglob)) {
											if ($lglob <= 2) {
												$lglob = 2;
											}
										} else {
											$lglob = 2;
										}
									}
									if ($el->data->code == 3) {
										if (isset($lglob)) {
											if ($lglob <= 3) {
												$lglob = 3;
											}
										} else {
											$lglob = 3;
										}
									}
								}
								if (!isset($lglob)) {
									$lglob = 0;
								}
								if ($lglob == 0) {
									echo('<span class="component-status mprj-inline-ok" title="">Operational</span>');
								}
								if ($lglob == 1) {
									echo('<span class="component-status mprj-inline-minor" title="">Minor Problems</span>');
								}
								if ($lglob == 2) {
									echo('<span class="component-status mprj-inline-major" title="">Major Problems</span>');
								}
								if ($lglob == 3) {
									echo('<span class="component-status mprj-inline-critial" title="">Down</span>');
								}
								echo(' <span class="tool icon-indicator fa fa-check tooltipstered"></span></div>');
								echo('<div class="child-components-container">');
								foreach ($site->data as $el) {
									echo('<div class="component-inner-container" data-component-status="operational" data-js-hook=""><span class="name">' . $el->name . '</span>');
									if (trim($el->description) != "") {
										echo('<span class="tooltip-base tool tooltipstered" title="' . str_replace("\"", "&quot;", $el->description) . '">?</span>');
									}
									if ($el->data->code == 0) {
										echo('<span class="component-status mprj-inline-ok" title="">' . $el->data->message . '</span>');
									}
									if ($el->data->code == 1) {
										echo('<span class="component-status mprj-inline-minor" title="">' . $el->data->message . '</span>');
									}
									if ($el->data->code == 2) {
										echo('<span class="component-status mprj-inline-major" title="">' . $el->data->message . '</span>');
									}
									if ($el->data->code == 3) {
										echo('<span class="component-status mprj-inline-critial" title="">' . $el->data->message . '</span>');
									}
									echo(' <span class="tool icon-indicator fa fa-check tooltipstered"></span></div>');
								}
								echo('</div></div>');
							}
						} else {
							echo('<div class="component-container border-color"><div class="component-inner-container showcased" data-js-hook=""><span class="name">' . $site->data->name . '</span>');
							if (trim($site->data->description) != "") {
								echo('<span class="tooltip-base tool tooltipstered" title="' . str_replace("\"", "&quot;", $site->data->description) . '">?</span>');
							}
							if ($site->data->data->code == 0) {
								echo('<span class="component-status mprj-inline-ok" title="">' . $site->data->data->message . '</span>');
							}
							if ($site->data->data->code == 1) {
								echo('<span class="component-status mprj-inline-minor" title="">' . $site->data->data->message . '</span>');
							}
							if ($site->data->data->code == 2) {
								echo('<span class="component-status mprj-inline-major" title="">' . $site->data->data->message . '</span>');
							}
							if ($site->data->data->code == 3) {
								echo('<span class="component-status mprj-inline-critial" title="">' . $site->data->data->message . '</span>');
							}
							echo('<span class="tool icon-indicator fa fa-check tooltipstered"></span><div class="shared-partial uptime-30-days-wrapper"><svg class="availability-time-line-graphic" height="34" preserveaspectratio="none" viewbox="0 0 802 34" width="100%">');
							$hip = 0;
							$histories = array_reverse($site->history);
							foreach ($histories as $history) {
								echo(svgBar($hip, $history));
								$hip = $hip + 1;
							}
							echo('</svg><div class="legend"><div class="legend-item legend-item-uptime-value legend-item-rhznvxg4v7yh"><span id="uptime-percent-rhznvxg4v7yh">' . $site->data->percentage . '</span> % uptime</div></div></div></div></div>');
						}
					}
					?>
                    </div>
                    <div id="uptime-tooltip" style="display: none;">
                        <div class="pointer-container" style="left: 1055px; top: 931.933px;">
                            <div class="pointer-larger"></div>
                            <div class="pointer-smaller"></div>
                        </div>
                        <div class="tooltip-box" style="left: 900.5px; top: 941.933px;">
                            <div class="tooltip-content">
                                <div class="tooltip-close hidden">
                                    <i class="fa fa-times"></i>
                                </div>
                                <div class="date">
                                    1 minutes ago
                                </div>
                                <div class="outages">
                                    <div class="outage-field major" style="display: none;">
                                        <span class="label"><i class="component-status page-colors text-color major_outage"></i> Major outage</span> <span class="value-hrs"></span> <span class="value-mins"></span>
                                    </div>
                                    <div class="outage-field partial" style="display: none;">
                                        <span class="label"><i class="component-status page-colors text-color partial_outage"></i> Partial outage</span> <span class="value-hrs"></span> <span class="value-mins"></span>
                                    </div>
                                    <div class="no-outages-msg" style="display: block;">
                                        No downtime recorded on this minute.
                                    </div>
                                    <div class="outage-count" id="major-outage-group-count" style="display: none;">
                                        <i class="component-status page-colors text-color major_outage"></i> <span class="count"></span> had a major outage
                                    </div>
                                    <div class="outage-count" id="partial-outage-group-count" style="display: none;">
                                        <i class="component-status page-colors text-color partial_outage"></i> <span class="count"></span> had a partial outage
                                    </div>
                                </div>
                                <div class="related-events hidef">
                                    <h3 id="related-event-header">Related</h3>
                                    <ul id="related-events-list"></ul>
                                </div>
                                <div class="no-related-msg hidef">
                                    <p>No incidents or maintenance related to this downtime.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="rsc/bowser-cba5cf944efc2e8d45d5d2a40ed2d6839ecb5ed1a614d19f00e454.js">
                    </script>
                    <div class="page-footer border-color font-small">
                        <span class="history-footer-link" style="float:left;">Last update <?= $updated ?><br>
						<?= !isset($_GET['debug']) ? '<a class="color-secondary" href="?debug">Access page debugger</a>' : '<a class="color-secondary" href=".">Access normal page</a>' ?>
						</span>
                        <span class="color-secondary powered-by" style="display: inline !important; visibility:visible !important; opacity: 1 !important; position:static !important; text-indent:0px !important; transform:scale(1) !important"><a class="color-secondary" href="https://www.statuspage.io/powered-by?utm_content=status-pages&amp;utm_medium=powered-by&amp;utm_source=inapp" rel="noopener noreferrer nofollow" target="_blank">Frontend based on Statuspage</a><br>
                        <a class="color-secondary" href="https://gitlab.com/minteck-projects/miscellanous/autouptime" rel="noopener noreferrer nofollow" target="_blank">Powered by Minteck Projects Auto-Uptime</a></span>
                    </div>
                </div>
            </div>
            <script src="rsc/status_manifest-e9be9d9459d52d29566a6e7ce9fa0b71a6d4152389fbb.js"></script>
            <div id="cpt-notification-container"></div>
            <script src="rsc/unified/unified.js"></script>
            <script src="rsc/unified/data.unified.js.php"></script>
        </div>
        </div>
    </body>
</html>
