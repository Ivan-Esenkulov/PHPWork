<?php
if ($APPLICATION->GetCurPage() == "/"): ?>
<select onchange="window.location.href=this.options[this.selectedIndex].value">
    <option value="/ex2/site2/">en</option>
    <option selected value="/">ru</option>
</select>
<?php else: ?>
    <select onchange="window.location.href=this.options[this.selectedIndex].value">
        <option selected value="/ex2/site2/">en</option>
        <option value="/">ru</option>
    </select>
<?php endif; ?>
