<?php

namespace MediaCloud\Vendor\Aws\Iot;
use MediaCloud\Vendor\Aws\AwsClient;

/**
 * This client is used to interact with the **AWS IoT** service.
 *
 * @method \MediaCloud\Vendor\Aws\Result acceptCertificateTransfer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise acceptCertificateTransferAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result addThingToBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise addThingToBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result addThingToThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise addThingToThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result associateTargetsWithJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise associateTargetsWithJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result attachPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise attachPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result attachPrincipalPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise attachPrincipalPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result attachSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise attachSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result attachThingPrincipal(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise attachThingPrincipalAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result cancelAuditMitigationActionsTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelAuditMitigationActionsTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result cancelAuditTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelAuditTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result cancelCertificateTransfer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelCertificateTransferAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result cancelJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result cancelJobExecution(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise cancelJobExecutionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result clearDefaultAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise clearDefaultAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result confirmTopicRuleDestination(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise confirmTopicRuleDestinationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createAuditSuppression(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createAuditSuppressionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createCertificateFromCsr(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createCertificateFromCsrAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDimension(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDimensionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDomainConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDomainConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createDynamicThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createDynamicThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createKeysAndCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createKeysAndCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createMitigationAction(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createMitigationActionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createOTAUpdate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createOTAUpdateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createPolicyVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createPolicyVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createProvisioningClaim(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createProvisioningClaimAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createProvisioningTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createProvisioningTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createProvisioningTemplateVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createProvisioningTemplateVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createRoleAlias(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createRoleAliasAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createScheduledAudit(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createScheduledAuditAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createStream(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createThingType(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createThingTypeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result createTopicRuleDestination(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise createTopicRuleDestinationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteAccountAuditConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteAccountAuditConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteAuditSuppression(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteAuditSuppressionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteCACertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteCACertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDimension(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDimensionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDomainConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDomainConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteDynamicThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteDynamicThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteJobExecution(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteJobExecutionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteMitigationAction(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteMitigationActionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteOTAUpdate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteOTAUpdateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deletePolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deletePolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deletePolicyVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deletePolicyVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteProvisioningTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteProvisioningTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteProvisioningTemplateVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteProvisioningTemplateVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteRegistrationCode(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteRegistrationCodeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteRoleAlias(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteRoleAliasAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteScheduledAudit(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteScheduledAuditAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteStream(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteThingType(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteThingTypeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteTopicRuleDestination(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteTopicRuleDestinationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deleteV2LoggingLevel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deleteV2LoggingLevelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result deprecateThingType(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise deprecateThingTypeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAccountAuditConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAccountAuditConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAuditFinding(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAuditFindingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAuditMitigationActionsTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAuditMitigationActionsTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAuditSuppression(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAuditSuppressionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAuditTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAuditTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeCACertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeCACertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeDefaultAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeDefaultAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeDimension(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeDimensionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeDomainConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeDomainConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeEndpoint(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeEndpointAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeEventConfigurations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeEventConfigurationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeIndex(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeIndexAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeJobExecution(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeJobExecutionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeMitigationAction(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeMitigationActionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeProvisioningTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeProvisioningTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeProvisioningTemplateVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeProvisioningTemplateVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeRoleAlias(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeRoleAliasAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeScheduledAudit(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeScheduledAuditAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeStream(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeThingRegistrationTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeThingRegistrationTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result describeThingType(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise describeThingTypeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result detachPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise detachPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result detachPrincipalPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise detachPrincipalPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result detachSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise detachSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result detachThingPrincipal(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise detachThingPrincipalAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result disableTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise disableTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result enableTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise enableTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getCardinality(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getCardinalityAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getEffectivePolicies(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getEffectivePoliciesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getIndexingConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getIndexingConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getJobDocument(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getJobDocumentAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getLoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getLoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getOTAUpdate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getOTAUpdateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getPercentiles(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getPercentilesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getPolicyVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getPolicyVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getRegistrationCode(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getRegistrationCodeAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getStatistics(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getStatisticsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getTopicRuleDestination(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getTopicRuleDestinationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result getV2LoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise getV2LoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listActiveViolations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listActiveViolationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAttachedPolicies(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAttachedPoliciesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuditFindings(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuditFindingsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuditMitigationActionsExecutions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuditMitigationActionsExecutionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuditMitigationActionsTasks(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuditMitigationActionsTasksAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuditSuppressions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuditSuppressionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuditTasks(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuditTasksAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listAuthorizers(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listAuthorizersAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listBillingGroups(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listBillingGroupsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listCACertificates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listCACertificatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listCertificates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listCertificatesByCA(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listCertificatesByCAAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDimensions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDimensionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listDomainConfigurations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listDomainConfigurationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listIndices(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listIndicesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listJobExecutionsForJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listJobExecutionsForJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listJobExecutionsForThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listJobExecutionsForThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listJobs(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listMitigationActions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listMitigationActionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listOTAUpdates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listOTAUpdatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listOutgoingCertificates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listOutgoingCertificatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listPolicies(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listPoliciesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listPolicyPrincipals(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listPolicyPrincipalsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listPolicyVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listPolicyVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listPrincipalPolicies(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listPrincipalPoliciesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listPrincipalThings(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listPrincipalThingsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listProvisioningTemplateVersions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listProvisioningTemplateVersionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listProvisioningTemplates(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listProvisioningTemplatesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listRoleAliases(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listRoleAliasesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listScheduledAudits(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listScheduledAuditsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listSecurityProfiles(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listSecurityProfilesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listSecurityProfilesForTarget(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listSecurityProfilesForTargetAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listStreams(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTagsForResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTargetsForPolicy(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTargetsForPolicyAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTargetsForSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTargetsForSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingGroups(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingGroupsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingGroupsForThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingGroupsForThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingPrincipals(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingPrincipalsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingRegistrationTaskReports(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingRegistrationTaskReportsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingRegistrationTasks(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingRegistrationTasksAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingTypes(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingTypesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThings(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingsInBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingsInBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listThingsInThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listThingsInThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTopicRuleDestinations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTopicRuleDestinationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listTopicRules(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listTopicRulesAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listV2LoggingLevels(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listV2LoggingLevelsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result listViolationEvents(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise listViolationEventsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result registerCACertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise registerCACertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result registerCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise registerCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result registerCertificateWithoutCA(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise registerCertificateWithoutCAAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result registerThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise registerThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result rejectCertificateTransfer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise rejectCertificateTransferAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result removeThingFromBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise removeThingFromBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result removeThingFromThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise removeThingFromThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result replaceTopicRule(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise replaceTopicRuleAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result searchIndex(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise searchIndexAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result setDefaultAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise setDefaultAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result setDefaultPolicyVersion(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise setDefaultPolicyVersionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result setLoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise setLoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result setV2LoggingLevel(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise setV2LoggingLevelAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result setV2LoggingOptions(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise setV2LoggingOptionsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startAuditMitigationActionsTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startAuditMitigationActionsTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startOnDemandAuditTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startOnDemandAuditTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result startThingRegistrationTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise startThingRegistrationTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result stopThingRegistrationTask(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise stopThingRegistrationTaskAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result tagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result testAuthorization(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise testAuthorizationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result testInvokeAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise testInvokeAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result transferCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise transferCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result untagResource(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateAccountAuditConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateAccountAuditConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateAuditSuppression(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateAuditSuppressionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateAuthorizer(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateAuthorizerAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateBillingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateBillingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateCACertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateCACertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateCertificate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateCertificateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDimension(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDimensionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDomainConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDomainConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateDynamicThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateDynamicThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateEventConfigurations(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateEventConfigurationsAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateIndexingConfiguration(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateIndexingConfigurationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateJob(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateMitigationAction(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateMitigationActionAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateProvisioningTemplate(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateProvisioningTemplateAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateRoleAlias(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateRoleAliasAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateScheduledAudit(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateScheduledAuditAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateSecurityProfile(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateSecurityProfileAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateStream(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateStreamAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateThingGroup(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateThingGroupAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateThingGroupsForThing(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateThingGroupsForThingAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result updateTopicRuleDestination(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise updateTopicRuleDestinationAsync(array $args = [])
 * @method \MediaCloud\Vendor\Aws\Result validateSecurityProfileBehaviors(array $args = [])
 * @method \MediaCloud\Vendor\GuzzleHttp\Promise\Promise validateSecurityProfileBehaviorsAsync(array $args = [])
 */
class IotClient extends AwsClient {}