#!/bin/bash

get_latest_version() {
    packageName=$1
    latestVersion=$(curl -s "https://repo.packagist.org/p2/${packageName}.json" | jq -r '.packages["'$packageName'"] | keys[] as $k | .[$k].version' | sort -V | tail -1)
    echo "$latestVersion"
}

update_version() {
    packageName=$1
    newVersion=$2
    oldVersion=$3
    escapedPackageName=$(sed 's/[\*\.&\/]/\\&/g' <<< "$packageName")
    escapedOldVersion=$(sed 's/[\*\.&\/]/\\&/g' <<< "$oldVersion")
    escapedNewVersion=$(sed 's/[\*\.&\/]/\\&/g' <<< "$newVersion")
    jq --arg packageName "$packageName" --arg oldVersion "$oldVersion" --arg newVersion "$newVersion" '.require[$packageName] = $newVersion' composer.json > composer.json.tmp && mv composer.json.tmp composer.json
}

jq -r 'keys[] as $k | "\($k) \(.[$k])"' composer.json | while read -r key value; do
    if [[ $key == require ]]; then
        jq -r 'keys[] as $k | "\($k) \(.[$k])"' <<< "$value" | while read -r packageName version; do
            if [[ $packageName != "php" && $packageName != "ext-json" ]]; then
                latestVersion=$(get_latest_version "$packageName")
                if [[ $version != $latestVersion ]]; then
                    echo "Updating $packageName from $version to $latestVersion"
                    update_version "$packageName" "$latestVersion" "$version"
                fi
            fi
        done
    fi
done
