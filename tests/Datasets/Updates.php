<?php

dataset('updates', [
    // 1. Text Message Update
    'message' => '{"update_id":1001,"message":{"message_id":101,"from":{"id":123456789,"is_bot":false,"first_name":"Alice","last_name":"Smith","username":"alice_smith","language_code":"en"},"chat":{"id":123456789,"first_name":"Alice","last_name":"Smith","username":"alice_smith","type":"private"},"date":1610000000,"text":"Hello, bot!"}}',

    // 2. Edited Message Update
    'edited_message' => '{"update_id":1002,"edited_message":{"message_id":102,"from":{"id":987654321,"is_bot":false,"first_name":"Bob","username":"bob_the_builder"},"chat":{"id":987654321,"first_name":"Bob","username":"bob_the_builder","type":"private"},"date":1610000001,"edit_date":1610000050,"text":"Edited message content"}}',

    // 3. Callback Query Update
    'callback_query' => '{"update_id":1003,"callback_query":{"id":"abc123","from":{"id":555666777,"is_bot":false,"first_name":"Charlie","username":"charlie_chaplin"},"message":{"message_id":103,"chat":{"id":555666777,"first_name":"Charlie","username":"charlie_chaplin","type":"private"},"date":1610000002,"text":"Do you like this bot?","reply_markup":{"inline_keyboard":[[{"text":"Yes","callback_data":"yes"},{"text":"No","callback_data":"no"}]]}},"chat_instance":"unique_chat_instance_id","data":"yes"}}',

    // 4. Inline Query Update
    'inline_query' => '{"update_id":1004,"inline_query":{"id":"inline123","from":{"id":111222333,"is_bot":false,"first_name":"Dana","username":"dana_scully"},"query":"search term","offset":""}}',

    // 5. Chosen Inline Result Update
    'chosen_inline_result' => '{"update_id":1005,"chosen_inline_result":{"result_id":"result123","from":{"id":444555666,"is_bot":false,"first_name":"Eve","username":"eve_online"},"query":"search term"}}',

    // 6. Channel Post Update
    'channel_post' => '{"update_id":1006,"channel_post":{"message_id":104,"chat":{"id":-1001234567890,"title":"Channel Name","type":"channel"},"date":1610000003,"text":"New post in the channel"}}',

    // 7. Edited Channel Post Update
    'edited_channel_post' => '{"update_id":1007,"edited_channel_post":{"message_id":105,"chat":{"id":-1001234567890,"title":"Channel Name","type":"channel"},"date":1610000004,"edit_date":1610000060,"text":"Edited channel post content"}}',

    // 8. Shipping Query Update
    'shipping_query' => '{"update_id":1008,"shipping_query":{"id":"ship123","from":{"id":777888999,"is_bot":false,"first_name":"Frank","username":"frank_castle"},"invoice_payload":"payload","shipping_address":{"country_code":"US","state":"CA","city":"Los Angeles","street_line1":"123 Main St","street_line2":"Apt 4","post_code":"90001"}}}',

    // 9. Pre-checkout Query Update
    'pre_checkout_query' => '{"update_id":1009,"pre_checkout_query":{"id":"checkout123","from":{"id":222333444,"is_bot":false,"first_name":"Grace","username":"grace_hopper"},"currency":"USD","total_amount":5000,"invoice_payload":"payload","order_info":{"name":"Grace Hopper","phone_number":"+1234567890","email":"grace@example.com","shipping_address":{"country_code":"US","state":"CA","city":"Los Angeles","street_line1":"123 Main St","street_line2":"Apt 4","post_code":"90001"}}}}',

    // 10. Poll Update
    'poll' => '{"update_id":1010,"poll":{"id":"poll123","is_anonymous":false,"question":"What\'s your favorite color?","options":[{"text":"Red","voter_count":0},{"text":"Blue","voter_count":0},{"text":"Green","voter_count":0}],"total_voter_count":0,"is_closed":false,"type":"regular","allows_multiple_answers":false}}',

    // 11. Poll Answer Update
    'poll_answer' => '{"update_id":1011,"poll_answer":{"poll_id":"poll123","user":{"id":333444555,"is_bot":false,"first_name":"Hank","username":"hank_hill"},"option_ids":[1]}}',

    // 12. My Chat Member Update
    'my_chat_member' => '{"update_id":1012,"my_chat_member":{"chat":{"id":-1009876543210,"title":"Group Chat","type":"supergroup"},"from":{"id":666777888,"is_bot":false,"first_name":"Ivy","username":"ivy_ivy"},"date":1610000005,"old_chat_member":{"user":{"id":111222333,"is_bot":true,"first_name":"TestBot","username":"test_bot"},"status":"member"},"new_chat_member":{"user":{"id":111222333,"is_bot":true,"first_name":"TestBot","username":"test_bot"},"status":"member"}}}',

    // 13. Chat Member Update
    'chat_member' => '{"update_id":1013,"chat_member":{"chat":{"id":-1009876543210,"title":"Group Chat","type":"supergroup"},"from":{"id":999888777,"is_bot":false,"first_name":"Jack","username":"jack_sparrow"},"date":1610000006,"old_chat_member":{"user":{"id":555444333,"is_bot":false,"first_name":"Karen","username":"karen_k"},"status":"member"},"new_chat_member":{"user":{"id":555444333,"is_bot":false,"first_name":"Karen","username":"karen_k"},"status":"kicked","until_date":1610000100}}}',

    // 14. Chat Join Request Update
    'chat_join_request' => '{"update_id":1014,"chat_join_request":{"user_chat_id":333444555,"chat":{"id":-1001234567890,"title":"Channel Name","type":"channel"},"from":{"id":222111000,"is_bot":false,"first_name":"Leo","username":"leo_leo"},"date":1610000007,"invite_link":{"invite_link":"https://t.me/joinchat/abcdef123456","creator":{"id":111222333,"is_bot":false,"first_name":"Dana","username":"dana_scully"},"creates_join_request":true,"is_primary":true,"is_revoked":false}}}',
]);
