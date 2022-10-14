<?php
/**
 * This source file is proprietary and part of Rebilly.
 *
 * (c) Rebilly SRL
 *     Rebilly Ltd.
 *     Rebilly Inc.
 *
 * @see https://www.rebilly.com
 */

declare(strict_types=1);

namespace Rebilly\Sdk\Model;

use DateTimeImmutable;
use JsonSerializable;

class AML implements JsonSerializable
{
    public const SOURCE_TYPE_PEP = 'pep';

    public const SOURCE_TYPE_SANCTIONS = 'sanctions';

    public const SOURCE_TYPE_ADVERSE_MEDIA = 'adverse-media';

    public const SOURCE_TYPE_ENFORCEMENTS = 'enforcements';

    public const TYPE_INDIVIDUAL = 'individual';

    public const TYPE_ENTITY = 'entity';

    public const CONFIDENCE_WEAK = 'weak';

    public const CONFIDENCE_MEDIUM = 'medium';

    public const CONFIDENCE_STRONG = 'strong';

    public const CONFIDENCE_VERY_STRONG = 'very-strong';

    private array $fields = [];

    public function __construct(array $data = [])
    {
        if (array_key_exists('firstName', $data)) {
            $this->setFirstName($data['firstName']);
        }
        if (array_key_exists('lastName', $data)) {
            $this->setLastName($data['lastName']);
        }
        if (array_key_exists('source', $data)) {
            $this->setSource($data['source']);
        }
        if (array_key_exists('sourceType', $data)) {
            $this->setSourceType($data['sourceType']);
        }
        if (array_key_exists('gender', $data)) {
            $this->setGender($data['gender']);
        }
        if (array_key_exists('title', $data)) {
            $this->setTitle($data['title']);
        }
        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }
        if (array_key_exists('legalBasis', $data)) {
            $this->setLegalBasis($data['legalBasis']);
        }
        if (array_key_exists('regime', $data)) {
            $this->setRegime($data['regime']);
        }
        if (array_key_exists('confidence', $data)) {
            $this->setConfidence($data['confidence']);
        }
        if (array_key_exists('nationality', $data)) {
            $this->setNationality($data['nationality']);
        }
        if (array_key_exists('address', $data)) {
            $this->setAddress($data['address']);
        }
        if (array_key_exists('dob', $data)) {
            $this->setDob($data['dob']);
        }
        if (array_key_exists('aliases', $data)) {
            $this->setAliases($data['aliases']);
        }
        if (array_key_exists('passport', $data)) {
            $this->setPassport($data['passport']);
        }
        if (array_key_exists('comments', $data)) {
            $this->setComments($data['comments']);
        }
        if (array_key_exists('_links', $data)) {
            $this->setLinks($data['_links']);
        }
    }

    public static function from(array $data = []): self
    {
        return new self($data);
    }

    public function getFirstName(): ?string
    {
        return $this->fields['firstName'] ?? null;
    }

    public function getLastName(): ?string
    {
        return $this->fields['lastName'] ?? null;
    }

    public function getSource(): ?string
    {
        return $this->fields['source'] ?? null;
    }

    /**
     * @return null|string[]
     *
     * @psalm-return self::SOURCE_TYPE_*|null $sourceType
     */
    public function getSourceType(): ?array
    {
        return $this->fields['sourceType'] ?? null;
    }

    public function getGender(): ?string
    {
        return $this->fields['gender'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getTitle(): ?array
    {
        return $this->fields['title'] ?? null;
    }

    /**
     * @psalm-return self::TYPE_*|null $type
     */
    public function getType(): ?string
    {
        return $this->fields['type'] ?? null;
    }

    /**
     * @return null|string[]
     */
    public function getLegalBasis(): ?array
    {
        return $this->fields['legalBasis'] ?? null;
    }

    public function getRegime(): ?string
    {
        return $this->fields['regime'] ?? null;
    }

    /**
     * @psalm-return self::CONFIDENCE_*|null $confidence
     */
    public function getConfidence(): ?string
    {
        return $this->fields['confidence'] ?? null;
    }

    public function getNationality(): ?string
    {
        return $this->fields['nationality'] ?? null;
    }

    /**
     * @return null|AMLAddress[]
     */
    public function getAddress(): ?array
    {
        return $this->fields['address'] ?? null;
    }

    /**
     * @return null|DateTimeImmutable[]
     */
    public function getDob(): ?array
    {
        return $this->fields['dob'] ?? null;
    }

    /**
     * @return null|AMLAliases[]
     */
    public function getAliases(): ?array
    {
        return $this->fields['aliases'] ?? null;
    }

    /**
     * @return null|AMLPassport[]
     */
    public function getPassport(): ?array
    {
        return $this->fields['passport'] ?? null;
    }

    public function getComments(): ?string
    {
        return $this->fields['comments'] ?? null;
    }

    /**
     * @return null|SelfLink[]
     */
    public function getLinks(): ?array
    {
        return $this->fields['_links'] ?? null;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        if (array_key_exists('firstName', $this->fields)) {
            $data['firstName'] = $this->fields['firstName'];
        }
        if (array_key_exists('lastName', $this->fields)) {
            $data['lastName'] = $this->fields['lastName'];
        }
        if (array_key_exists('source', $this->fields)) {
            $data['source'] = $this->fields['source'];
        }
        if (array_key_exists('sourceType', $this->fields)) {
            $data['sourceType'] = $this->fields['sourceType'];
        }
        if (array_key_exists('gender', $this->fields)) {
            $data['gender'] = $this->fields['gender'];
        }
        if (array_key_exists('title', $this->fields)) {
            $data['title'] = $this->fields['title'];
        }
        if (array_key_exists('type', $this->fields)) {
            $data['type'] = $this->fields['type'];
        }
        if (array_key_exists('legalBasis', $this->fields)) {
            $data['legalBasis'] = $this->fields['legalBasis'];
        }
        if (array_key_exists('regime', $this->fields)) {
            $data['regime'] = $this->fields['regime'];
        }
        if (array_key_exists('confidence', $this->fields)) {
            $data['confidence'] = $this->fields['confidence'];
        }
        if (array_key_exists('nationality', $this->fields)) {
            $data['nationality'] = $this->fields['nationality'];
        }
        if (array_key_exists('address', $this->fields)) {
            $data['address'] = $this->fields['address'];
        }
        if (array_key_exists('dob', $this->fields)) {
            $data['dob'] = $this->fields['dob'];
        }
        if (array_key_exists('aliases', $this->fields)) {
            $data['aliases'] = $this->fields['aliases'];
        }
        if (array_key_exists('passport', $this->fields)) {
            $data['passport'] = $this->fields['passport'];
        }
        if (array_key_exists('comments', $this->fields)) {
            $data['comments'] = $this->fields['comments'];
        }
        if (array_key_exists('_links', $this->fields)) {
            $data['_links'] = $this->fields['_links'];
        }

        return $data;
    }

    private function setFirstName(null|string $firstName): self
    {
        $this->fields['firstName'] = $firstName;

        return $this;
    }

    private function setLastName(null|string $lastName): self
    {
        $this->fields['lastName'] = $lastName;

        return $this;
    }

    private function setSource(null|string $source): self
    {
        $this->fields['source'] = $source;

        return $this;
    }

    /**
     * @param null|string[] $sourceType
     *
     * @psalm-param self::SOURCE_TYPE_*|null $sourceType
     */
    private function setSourceType(null|array $sourceType): self
    {
        $sourceType = $sourceType !== null ? array_map(fn ($value) => $value ?? null, $sourceType) : null;

        $this->fields['sourceType'] = $sourceType;

        return $this;
    }

    private function setGender(null|string $gender): self
    {
        $this->fields['gender'] = $gender;

        return $this;
    }

    /**
     * @param null|string[] $title
     */
    private function setTitle(null|array $title): self
    {
        $title = $title !== null ? array_map(fn ($value) => $value ?? null, $title) : null;

        $this->fields['title'] = $title;

        return $this;
    }

    /**
     * @psalm-param self::TYPE_*|null $type
     */
    private function setType(null|string $type): self
    {
        $this->fields['type'] = $type;

        return $this;
    }

    /**
     * @param null|string[] $legalBasis
     */
    private function setLegalBasis(null|array $legalBasis): self
    {
        $legalBasis = $legalBasis !== null ? array_map(fn ($value) => $value ?? null, $legalBasis) : null;

        $this->fields['legalBasis'] = $legalBasis;

        return $this;
    }

    private function setRegime(null|string $regime): self
    {
        $this->fields['regime'] = $regime;

        return $this;
    }

    /**
     * @psalm-param self::CONFIDENCE_*|null $confidence
     */
    private function setConfidence(null|string $confidence): self
    {
        $this->fields['confidence'] = $confidence;

        return $this;
    }

    private function setNationality(null|string $nationality): self
    {
        $this->fields['nationality'] = $nationality;

        return $this;
    }

    /**
     * @param null|AMLAddress[] $address
     */
    private function setAddress(null|array $address): self
    {
        $address = $address !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof AMLAddress ? $value : AMLAddress::from($value)) : null, $address) : null;

        $this->fields['address'] = $address;

        return $this;
    }

    /**
     * @param null|DateTimeImmutable[] $dob
     */
    private function setDob(null|array $dob): self
    {
        $dob = $dob !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof DateTimeImmutable ? $value : new DateTimeImmutable($value)) : null, $dob) : null;

        $this->fields['dob'] = $dob;

        return $this;
    }

    /**
     * @param null|AMLAliases[] $aliases
     */
    private function setAliases(null|array $aliases): self
    {
        $aliases = $aliases !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof AMLAliases ? $value : AMLAliases::from($value)) : null, $aliases) : null;

        $this->fields['aliases'] = $aliases;

        return $this;
    }

    /**
     * @param null|AMLPassport[] $passport
     */
    private function setPassport(null|array $passport): self
    {
        $passport = $passport !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof AMLPassport ? $value : AMLPassport::from($value)) : null, $passport) : null;

        $this->fields['passport'] = $passport;

        return $this;
    }

    private function setComments(null|string $comments): self
    {
        $this->fields['comments'] = $comments;

        return $this;
    }

    /**
     * @param null|SelfLink[] $links
     */
    private function setLinks(null|array $links): self
    {
        $links = $links !== null ? array_map(fn ($value) => $value !== null ? ($value instanceof SelfLink ? $value : SelfLink::from($value)) : null, $links) : null;

        $this->fields['_links'] = $links;

        return $this;
    }
}
