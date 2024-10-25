# Contributing

Welcome, and thanks for lending a hand! Before we get started, please read the
[Couchbase Code of Conduct](CODE_OF_CONDUCT.md).

## Discussion

We'd love for you to join us on the [Couchbase Forum](https://couchbase.com/forums).
For more interactive discussions we have `#sdks` channel on our [Discord](https://discord.com/invite/sQ5qbPZuTh).

## Reporting Issues

The simplest way to help is to report bugs or request new features.

We use Jira for issue tracking: [https://jira.issues.couchbase.com/projects/PCBC/](https://jira.issues.couchbase.com/projects/PCBC/)

To create an issue, or comment on an existing issue, you'll need to sign up
for an account. It's quick and painless (or if it's not, click on the
"Report a problem" link on the signup page or get in touch via the forum).

## Pull Requests

We use Github for code review. But to allow us to integrate your changes, you need to register for a Gerrit account and
sign a Contributor License Agreement (CLA).

> We acknowledge Gerrit can be intimidating for new users.
> We're considering alternates that will make it easier for GitHub
> natives to contribute.

  1. Visit [https://review.couchbase.org](https://review.couchbase.org) and register for an account.
  2. Review our [Contributor Licence Agreement (CLA)](https://review.couchbase.org/static/individual_agreement.html).
  3. Agree to the CLA by visiting [https://review.couchbase.org/settings/#Agreements](https://review.couchbase.org/settings/#Agreements)
     Otherwise, we won't be able to merge your changes.

If you need any help along the way, please contact us on the [Couchbase Forum](https://couchbase.com/forums).

## Testing Your Changes

This repository is configured to use [Github Actions CI](https://docs.github.com/en/actions).
You can run test suite in your fork before submitting changes. The pipeline run
tests on variety of platforms that we support and also produces binary builds as
artifacts that could be downloaded for local testing. The definition of
pipelines could be found here:
[.github/workflows](https://github.com/couchbase/couchbase-php-client/tree/main/.github/workflows)
