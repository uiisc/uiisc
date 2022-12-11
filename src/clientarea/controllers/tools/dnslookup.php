<?php

require_once __DIR__ . '/../../application.php';

if (isset($_POST['submit'])) {
    $domain = strtolower(post('domain'));
    if (!$domain) {
        setMessage('need field: domain', 'danger');
        echo 'Error: need domain field';
        die();
    }
    // A records
    $DNS_A = dns_get_record($domain, DNS_A);
    echo '<h5 class="mb-0">A Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>IP Address</th>';
    echo '</thead>';
    if (count($DNS_A) > 0) {
        foreach ($DNS_A as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['ip'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="4">No A records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // AAAA records
    $DNS_AAAA = dns_get_record($domain, DNS_AAAA);
    echo '<h5 class="mb-0">AAAA Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>IP Address</th>';
    echo '</thead>';
    if (count($DNS_AAAA) > 0) {
        foreach ($DNS_AAAA as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['ipv6'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="4">No AAAA records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // CNAME records
    $DNS_CNAME = dns_get_record($domain, DNS_CNAME);
    echo '<h5 class="mb-0">CNAME Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>IP Address</th>';
    echo '</thead>';
    if (count($DNS_CNAME) > 0) {
        foreach ($DNS_CNAME as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['target'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="4">No CNAME records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // TXT records
    $DNS_TXT = dns_get_record($domain, DNS_TXT);
    echo '<h5 class="mb-0">TXT Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>Content</th>';
    echo '</thead>';
    if (count($DNS_TXT) > 0) {
        foreach ($DNS_TXT as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['txt'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="4">No TXT records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // MX records
    $DNS_MX = dns_get_record($domain, DNS_MX);
    echo '<h5 class="mb-0">MX Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>Preference</th>';
    echo '<th>Target</th>';
    echo '</thead>';
    if (count($DNS_MX) > 0) {
        foreach ($DNS_MX as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['pri'] . '</td>';
            echo '<td>' . $Result['target'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="5">No MX records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // NS records
    $DNS_NS = dns_get_record($domain, DNS_NS);
    echo '<h5 class="mb-0">NS Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>Target</th>';
    echo '</thead>';
    if (count($DNS_NS) > 0) {
        foreach ($DNS_NS as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['target'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="4">No NS records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // CAA records
    $DNS_CAA = dns_get_record($domain, DNS_CAA);
    echo '<h5 class="mb-0">CAA Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th>';
    echo '<th>Type</th>';
    echo '<th>TTL</th>';
    echo '<th>Tag</th>';
    echo '<th>Flags</th>';
    echo '<th>Value</th>';
    echo '</thead>';
    if (count($DNS_CAA) > 0) {
        foreach ($DNS_CAA as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['tag'] . '</td>';
            echo '<td>' . $Result['flags'] . '</td>';
            echo '<td>' . $Result['value'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="6">No CAA records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';

    // SOA records
    $DNS_SOA = dns_get_record($domain, DNS_SOA);
    echo '<h5 class="mb-0">SOA Records</h5>';
    echo '<div class="table-responsive">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<th>Host</th><th>Type</th><th>TTL</th><th>Primary NS</th><th>Responsible Email</th>';
    echo '</thead>';
    if (count($DNS_SOA) > 0) {
        foreach ($DNS_SOA as $Result) {
            echo '<tr>';
            echo '<td>' . $Result['host'] . '</td>';
            echo '<td>' . $Result['type'] . '</td>';
            echo '<td>' . $Result['ttl'] . '</td>';
            echo '<td>' . $Result['mname'] . '</td>';
            echo '<td>' . $Result['rname'] . '</td>';
            echo '<tr>';
        }
    } else {
        echo '<tr><td class="text-center" colspan="5">No SOA records found</td></tr>';
    }
    echo '</table>';
    echo '</div>';
    die();
}

$PageInfo['title'] = 'DNS Lookup';
