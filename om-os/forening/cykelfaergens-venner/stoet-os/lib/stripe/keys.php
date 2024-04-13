<?
ini_set("variables_order", "EGPCS");
ini_set("clear_env", "no");
$publicTest = "pk_test_51Jly9AEkBCWqt5ziTj4vIcrK4tKaDzqghCej9B1mQl8CiGYxGwj9JH9VQIEjldDNZxfvZNcjGheWrgtXc9N6zPDk00CEHvZYSY";
$secretTest = "sk_test_51Jly9AEkBCWqt5ziDP6398ABDgeTihJuVWnkqKTLCJqkmEEhEDKoeb2jmIFuyIvEHX7yvyni2IjT1A9OKMwd5e3900yFuAkJnW";

$publicLive = "pk_live_51Jly9AEkBCWqt5ziZUus9VnBBsbKg7uP9tupHnx30p1FHEEmh3QReJLj5UgyurEICHL4DfRBWZ8IWJcyDAiACnjs00JdEDRN8A";
$secretLive = "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";

define("STRIPE_API_KEY", $secretTest);
define("STRIPE_P_KEY", $publicTest);
define("MAILCHIMP__API_KEY", "f8ec9e1a9a8096fb4f8b071c2098ee2a-us7");
define("MAILCHIMP__LIST_KEY", "31b28fa146");

\Stripe\Stripe::setApiKey(STRIPE_API_KEY);
