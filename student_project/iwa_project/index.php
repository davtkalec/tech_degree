<?php
include("header.php");
?>
      <div id="content">
        <h1>Administrator</h1>
          <p>Administrator enters and updates users, defines their types. Can browse all users by filtering based on name and type of user. He can see everything
 viewed by moderator. Administrator enters and updates associations (eg mountaineers, skiers, footballers, ...) and moderators for a particular association. When entering
the association- must enter the name and description of the association. Can browse / update created associations.</p>
<p>The administrator can see the total number of activities per individual user and the number of activities per individual association. The data can be sorted by the total number or the name of the association/user.</p>
          <h1>Moderator</h1>
          <p>The moderator has all views as a registered user and can also add a review, and update activities of the association (eg excursion, racing, socializing, etc.) for which he has the priviliges as a moderator. When entering the activity, you must select the participants of the activity, define the date and time of the activity and activity name, and
you may optionally add a description of the activity. When you enter the info, an activity creation date is set automatically.</p>
          <h1>Registered User</h1>
          <p>In addition to anonymous user views, the registered user also sees a list of activities that are associated with his privileges. User
 can filter a list of activities based on the association's name or the time period of activity management (from-to-date and time).
Clicking on the activity gets details about the activity (date and time of activity, date and time of activity creation, name and description). The Registered User also has a link to view other participants in the selected activity</p>
          <h1>Unregistered User</h1>
          <p>The unregistered user can see the list of associations and by selecting the association, see the general information about the association and the list of activities of the selected association (name only).</p>
    </div>
    </div>
<?php
include("footer.php");
?>