<?php

remove($id,"pokemon");
header("Location: ". DOMAIN_NAME. '/pokemon/read');

exit();